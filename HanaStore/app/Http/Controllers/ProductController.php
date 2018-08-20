<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use JD\Cloudder\Facades\Cloudder;
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
        $categories = Category::all();
        $categoryId = Input::get('categoryId');
        if ($categoryId == null || $categoryId == 0) {
            $products = Product::orderBy('created_at', 'desc')->paginate(5);
            return view('admin.layout.list')
                ->with('products_in_view', $products)
                ->with('categories', $categories)
                ->with('categoryId', $categoryId);
        } else {
            $products = Product::where('categoryId', Input::get('categoryId'))->orderBy('created_at', 'desc')->paginate(5);
            return view('admin.layout.list')
                ->with('products_in_view', $products)
                ->with('categories', $categories)
                ->with('categoryId', $categoryId);
        }
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
        $action = '/admin/product/store';
        return view('admin.product.form')
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
    public function store(StoreProductRequest $request)
    {
        $request->validated();
        $product = new Product();
        $current_time = time();
        $product->name = $request->get('name');
        $product->categoryId = $request->get('categoryId');
        $product->collectionId = $request->get('collectionId');
        $product->price = $request->get('price');
        Cloudder::upload($request->file('images')->getRealPath(), $current_time);
        $product->images = Cloudder::getResult()['url'];
        $product->sale = $request->get('sale');
        $product->description = $request->get('description');
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
        if ($product == null) {
            return view('admin.error.404');
        }
        $categoryId = $product->categoryId;
        $collectionId = $product->categoryId;
        $categories = Category::find($categoryId);
        $collection = Collection::find($collectionId);
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
        $current_time = time();
        $product->name = $request->input('name');
        $product->categoryId = $request->input('categoryId');
        $product->collectionId = $request->input('collectionId');
        $product->price = $request->input('price');
        $product->images = $request->input('images');
//        Cloudder::upload($request->file('images')->getRealPath(), $current_time);
//        $product->images = Cloudder::getResult()['url'];
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
