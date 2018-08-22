<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests\StoreCollectionRequest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Collection::all();
        return view('admin.collection.list')
            ->with('collection' , $collection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductPost $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollectionRequest $request)
    {
    $request->validated();
    $collection = new Collection();

    $collection->name = $request -> get('name');
    $collection->description = $request->get('description');
    $collection->images = $request->get('images');
    $collection->save();
    return redirect('admin/collection');



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
        $collection = Collection::find($id);
        if ($collection == null){
            return view('404');
        }
        return view('admin.collection.edit')
            ->with('collection',$collection);

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
        $collection = Collection::find($id);
        $validate_unique = '';
        if($collection->name != $request->get('name')){
            $validate_unique = '|unique:collections';
        }
        $request -> validate([
            'name' => 'required|max:50|min:6' . $validate_unique,
            'description' => 'required',
            'images' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên bộ sưu tập.',
            'name.min' => 'Tên quá ngắn, vui lòng nhập ít nhất 7 ký tự.',
            'name.max' => 'Tên quá dài, vui lòng nhập nhiều nhất 50 ký tự.',
            'name.unique' => 'Tên đã được sử dụng, vui lòng chọn tên khác.',
            'description.required' => 'Vui lòng nhập mô tả cho bộ sưu tập',
            'images.required' => 'Vui lòng nhập ảnh đại diện cho bộ sưu tập'
            ]);

        if ($collection == null){
            return view('404');
        }
        $collection->name = $request->get('name');
        $collection->images = $request->get('images');
        $collection->description = $request->get('description');
        $collection->save();
        return redirect('/admin/collection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::find($id);
        if ($collection == null) {
            return response()->json(['message' => 'Bộ sưu tập không tồn tại hoặc đã bị xóa'], 404);
        }
        $collection->status = 0;
        $collection->save();
        return response()->json(['message' => 'Xóa bộ sưu tập thành công']);
    }
}
