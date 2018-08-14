<?php


namespace App\Http\Controllers;


use App\ProductModel;

use Illuminate\Http\Request;


class ProductModelController extends Controller

{

     public function index()
    {

    }


    public function create()
    {
        return View::make('admin.flower.form-create');
    }


    public function store()
    {
        rules = array(
            'name' => 'required',
            'categoryId' => 'required',
            'collectionId' => 'required',
            'price' => 'required',
            'images' => 'nullable',
            'sale' => 'nullable',
            'description' => 'nullable',
            'detail' => 'required|max:255',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin.flower.form-create');
                ->withErrors($validator)

        }   else {

            $product = new ProductModel;
            $product->name = Input::get('name');
            $product->categoryId = Input::get('categoryId');
            $product->collectionId = Input::get('collectionId');
            $product->price = Input::get('price');
            $product->images = Input::get('images');
            $product->sale = Input::get('sale');
            $product->description = Input::get('description');
            $product->detail = Input::get('detail');

            Session::flash('message', 'Successfully created product');
            return Redirect::to('admin.flower.form-create');
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $product = ProductModel::find($id);

        return View::make('admin.flower.form-edit')->with('product', $product);
    }

    public function update($id)
    {
        rules = array(
            'name' => 'required',
            'categoryId' => 'required',
            'collectionId' => 'required',
            'price' => 'required',
            'images' => 'nullable',
            'sale' => 'nullable',
            'description' => 'nullable',
            'detail' => 'required|max:255',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin.flower.form-edit');
                ->withErrors($validator)

        }   else {

            $product = new ProductModel;
            $product->name = Input::get('name');
            $product->categoryId = Input::get('categoryId');
            $product->collectionId = Input::get('collectionId');
            $product->price = Input::get('price');
            $product->images = Input::get('images');
            $product->sale = Input::get('sale');
            $product->description = Input::get('description');
            $product->detail = Input::get('detail');

            Session::flash('message', 'Successfully updated product');
            return Redirect::to('admin.flower.form-edit');
        }
    }


    public function destroy($id)
    {
        $product = ProductModel::find($id);
        $product->delete();

        Session::flash('message', 'Successfully deleted product')
        return Redirect::to('admin.flower.list');
    }

}