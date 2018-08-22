<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_category = Category::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
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

        $category = new Category();
        $category->name = $request->get('name');
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
        if ($category == null || $category->status != 1) {
            return view('admin.error.404');
        }
        return view('admin.category.edit')->with('category', $category);
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
        if($category->name != $request->get('name')){
            $validate_unique = '|unique:categories';
        }
        $request->validate([
            'name' => 'required|max:50|min:6' . $validate_unique,
            'description' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.min' => 'Tên quá ngắn, vui lòng nhập ít nhất 6 ký tự.',
            'name.max' => 'Tên quá dài, vui lòng nhập nhiều nhất 50 ký tự.',
            'name.unique' => 'Tên đã được sử dụng, vui lòng chọn tên khác.',
            'description.required' => 'Vui lòng nhập mô tả cho danh mục'
        ]);

        if ($category == null || $category->status != 1) {
            return view('admin.error.404');
        }
        $category->name = $request->get('name');
        $category->description = $request->get('description');
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
        //
    }
}
