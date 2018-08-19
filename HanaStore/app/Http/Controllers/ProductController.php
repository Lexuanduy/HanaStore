<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Http\Requests\StoreProductPost;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $collections = Collection::all();
        $action = '/admin/bakery/store';
        return view('admin.product.create')
            ->with('categories', $categories)
            ->with('collections', $collections)
            ->with('action', $action);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductPost $request
     * @return \Illuminate\Http\Response
     */

    // test ok but need list view to redirect
    public function store(StoreProductPost $request)
    {
        $request->validated();
        $product = new Product();

        $product->name = $request['name'];
        $product->categoryId = $request['categoryId'];
        $product->collectionId = $request['collectionId'];
        $product->price = $request['price'];
        $product->images = $request['images'];
        $product->sale = $request['sale'];
        $product->description = $request['description'];
        $product->detail = $request->input('detail');
        $product->save();
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categoryId = $product->categoryId;
        $collectionId = $product->categoryId;
        $categories = Category::find($categoryId);
        $collection = Collection::find($collectionId);
        if ($product == null) {
            return ('Not found');
        }
        return view('admin.product.show')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('collection', $collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    // show form-edit after user clicked into edit button
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $collections = Collection::all();
        if ($product == null || $product->status != 1) {
            return view('404');
        }
        return view('admin.product.edit')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('collections', $collections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    // save new edited info into database with products table
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return view('404');
        }
        $product->name = $request->input('name');
        $product->categoryId = $request->input('categoryId');
        $product->collectionId = $request->input('collectionId');
        $product->price = $request->input('price');
        $product->images = $request->input('images');
        $product->sale = $request->input('sale');
        $product->description = $request->input('description');
        $product->detail = $request->input('detail');
        $product->save();
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
