<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //
    public function create()
    {
        $categories = Category::all();
        $collections  = Collection::all();
        $action = '/admin/bakery/store';
        return view('admin.product.form-create')
            ->with('categories', $categories)
            ->with('collections', $collections)
            ->with('action', $action);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categoryId = $product->categoryId;
        $collectionId = $product->categoryId;
        $categories = Category::find($categoryId);
        $collection = Collection::find($collectionId);

        if($product == null){
            return ('Not found');
        }

        return view('admin.layout.product-detail')
            ->with('product',$product)
            ->with('categories',$categories)
            ->with('collection',$collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // show form-edit after user clicked into edit button
    public function edit($id)
    {
        $action = '/admin/product/edit';
        $product = Product::find($id);
        $categories = Category::all();
        $collections = Collection::all();
        if ($product == null || $product->status != 1) {
            return view('404');
        }
        return view('admin.product.form-edit')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('collections', $collections)
            ->with('action', $action);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // save new edited info into database with products table
    public function update(Request $request, $id)
    {
        $id = Input::get('id');
        $product = Bakery::find($id);
        if ($product == null) {
            return view('404');
        }
        $product->name = $request->get('name');
        $product->categoryId = $request->get('categoryId');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->images = $request->get('images');
        $product->content = $request->get('content');
        $product->note = $request->get('note');
        $product->save();
        return redirect('/admin/bakery/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(['message' => 'Hoa không có trong hệ thống hoặc đã bán hết số lượng!'], 404);
        }
        $product->status = 0;
        $product->save();
        return response()->json(['message' => 'Đã xoá thông tin sản phẩm hoa này'], 200);
    }
}
