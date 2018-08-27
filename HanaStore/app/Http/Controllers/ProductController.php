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
        $collections = Collection::all();
        $categoryId = Input::get('categoryId');
        if ($categoryId == null || $categoryId == 0) {
            $products = Product::orderBy('created_at', 'desc')->paginate(5);
            return view('admin.product.list')
                ->with('products_in_view', $products)
                ->with('categories', $categories)
                ->with('collections', $collections)
                ->with('categoryId', $categoryId);
        } else {
            $products = Product::where('categoryId', $categoryId)->orderBy('created_at', 'desc')->paginate(5);
            return view('admin.product.list')
                ->with('products_in_view', $products)
                ->with('categories', $categories)
                ->with('collections', $collections)
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
     * @param  \App\Http\Requests\StoreProductRequest $request
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
    // phuocding customize validation for 'name' min 5
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validate_unique = '';
        if($product->name != $request->get('name')){
            $validate_unique = '|unique:products';
        }

        $request->validate([
            'name' => 'required|max:50|min:5' . $validate_unique,
            'price' => 'numeric',
            'images'=>'required',
            'sale' => 'numeric',
            'description' => 'required',
            'detail' => 'required',
        ],
            [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.min' => 'Tên quá ngắn, vui lòng nhập ít nhất 10 ký tự.',
            'name.max' => 'Tên quá dài, vui lòng nhập nhiều nhất 50 ký tự.',
            'price.numeric' => 'Vui lòng nhập giá sản phẩm là số.',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm cần sửa.',
            'sale.numeric' => 'Vui lòng nhập giá trị sale là số.',
            'description.required' => 'Vui lòng nhập mô tả cho sản phẩm.',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết cho sản phẩm.',
        ]);
        if ($product == null || $product->status != 1) {
            return view('admin.error.404');
        }
        $current_time = time();
        $product->name = $request->input('name');
        $product->categoryId = $request->input('categoryId');
        $product->collectionId = $request->input('collectionId');
        $product->price = $request->input('price');
        $file_image = $request->file('images')->getRealPath();
        Cloudder::upload($file_image, $current_time);
        $src_image = Cloudder::getResult();
        $product->images = $src_image['url'];
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

//    Live search action
//    function action(Request $request)
//    {
//        if($request->ajax())
//        {
//            $output = '';
//            $query = $request->get('query');
//            if($query != '')
//            {
//                $data = Product::where('Name', 'like', '%'.$query.'%')
//                    ->orWhere('Price', 'like', '%'.$query.'%')
//                    ->orWhere('Sale', 'like', '%'.$query.'%')
//                    ->orWhere('Description', 'like', '%'.$query.'%')
//                    ->orWhere('Detail', 'like', '%'.$query.'%')
//                    ->get();
//
//            }
//            else
//            {
//                $data = Product::orderBy('ID', 'desc')
//                    ->get();
//            }
//            $total_row = $data->count();
//            if($total_row > 0)
//            {
//                foreach($data as $row)
//                {
//                    $output .= '
//                    <tr>
//                     <td>'.$row->ID.'</td>
//                     <td>'.$row->Name.'</td>
//                     <td>'.$row->Image.'</td>
//                     <td>'.$row->Category.'</td>
//                     <td>'.$row->Collection.'</td>
//                     <td>'.$row->Price.'</td>
//                     <td>'.$row->Sale.'</td>
//                     <td>'.$row->Description.'</td>
//                     <td>'.$row->Detail.'</td>
//                    </tr>
//                    ';
//                }
//            }
//            else
//            {
//                $output = '
//                <tr>
//                 <td align="center" colspan="5">No Data Found</td>
//                </tr>
//               ';
//            }
//            $data = array(
//                'table_data'  => $output,
//                'total_data'  => $total_row
//            );
//
//            echo json_encode($data);
//        }
//    }
}
