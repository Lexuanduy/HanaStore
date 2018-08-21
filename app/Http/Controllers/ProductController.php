<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Product;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $collections = Collection::all();
        $products = Product::orderBy('created_at', 'DESC')->where('status',1)->paginate(5);
        return view('admin.flower.list')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('collections', $collections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $collections = Collection::all();
        return view('admin.flower.form-create')
            ->with('categories', $categories)
            ->with('collections', $collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $profuct = new Product();
        $profuct->name = Input::get('name');
        $profuct->categoryId = Input::get('categoryId');
        $profuct->collectionId = Input::get('collectionId');
        $profuct->price = Input::get('price');
        if (Input::hasFile('images')) {
            $image = Input::file('images');
            $filename = $image->getClientOriginalName();
            $path = public_path('/img/product/' . $filename);
            Image::make($image->getRealPath())->save($path);
            $profuct->images = $filename;
        }
        $profuct->sale = Input::get('sale');
        $profuct->description = Input::get('description');
        $profuct->detail = Input::get('detail');
        $profuct->save();
        return redirect('/admin/product')->with(['level_product' => 'success','product_success' => 'Thêm sản phẩm mới thành công']);
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getJson($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        return response()->json(['item' => $product], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $date = date('Y-m-d H:i:s'); // Ngày giờ hiện tại.
        $product = Product::find($id); // Tìm product với cái Id là Id mình truyền lên theo URL lúc bên view.
        if ($product == null) {
            return response()->json(['msg' => 'Not found'], 404); // Nếu không tìm thấy product với Id truyền vào thì trả về lỗi 404.
        }
        $product->name = Input::get('name-edit');
        $product->categoryId =Input::get('categoryId-edit');
        $product->collectionId = Input::get('collectionId-edit');
        $product->price = Input::get('price-edit');
        if (Input::hasFile('images-edit')) {
            $image = Input::file('images-edit');
            $filename = $image->getClientOriginalName();
            $path = public_path('/img/product/' . $filename);
            Image::make($image->getRealPath())->save($path);
            $product->images = $filename;
        }
        $product->sale=Input::get('sale-edit');
        $product->new = Input::get('new-edit');
        $product->description=Input::get('description-edit');
        $product->detail=Input::get('detail-edit');
        $product->updated_at = $date;
        $product->save();
        return redirect()->back()->with(['level_update' => 'success','update_success' => 'Sửa sản phẩm thành công.']);
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
            return response()->json(['msg' => 'Not found'], 404);
        }
        $product->status(0);
        $product->save();
        return redirect()->back()->with(['level_delete' => 'success','delete_success' => 'Xóa sản phẩm thành công.']);
    }

    public function destroyMany(){
        $product = Product::destroy(Input::get('ids'));
        $product->status(0);
        $product->save();
        return redirect()->back()->with(['level_delete' => 'success','delete_success' => 'Xóa sản phẩm thành công.']);
    }

}
