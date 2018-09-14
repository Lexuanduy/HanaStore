<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_category = Category::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin.category.list')->with('list_category', $list_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        $current_time = time();
        $category = new Category();
        $category->name = $request->get('name');
        Cloudder::upload($request->file('images')->getRealPath(), $current_time);
        $category->images = Cloudder::getResult()['url'];
        $category->description = $request->get('description');
        $category->save();
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category == null || $category->status != 1){
            return view('admin.error.404');
        }
        return view('admin.category.edit')
            ->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $validate_unique = '';
        $current_time = time();
        if($category->name != $request->get('name')){
            $validate_unique = '|unique:categories';
        }

        $request->validate([
            'name' => 'required|max:50|min:5' . $validate_unique,
            'images'=>'required',
            'description' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.min' => 'Tên quá ngắn, vui lòng nhập ít nhất 5 ký tự.',
            'name.max' => 'Tên quá dài, vui lòng nhập nhiều nhất 50 ký tự.',
            'images.required' => 'Vui lòng chọn ảnh danh mục cần sửa.',
            'description.required' => 'Vui lòng nhập mô tả cho sản phẩm.'
        ]);
        if ($category == null || $category->status != 1) {
            return view('admin.error.404');
        }
        $category->name = $request->input('name');
        $file_image = $request->file('images')->getRealPath();
        Cloudder::upload($file_image, $current_time);
        $src_image = Cloudder::getResult();
        $category->images = $src_image['url'];
        $category->description = $request->input('description');
        $category->save();
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['message' => 'Danh mục không tồn tại hoặc đã bị xóa'], 404);
        }
        $category->status = 0;
        $category->save();
        return response()->json(['message' => 'Xóa danh mục thành công']);
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'Successed delete category');
    }

    public function search()
    {
        $query = request('records');
        $list_category = Category::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('admin.category.list')->with(['list_category' => $list_category]);
    }
}
