<?php
/**
 * Created by PhpStorm.
 * User: Admins
 * Date: 8/19/2018
 * Time: 4:21 PM
 */

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    // Lấy ra sản phẩm từ database trả về view bên User
    public function getIndexUser()
    {
        // Gio hang
        $content = Cart::content();
        $countItemCart = Cart::count();
        $total = Cart::subtotal();

        $categories = Category::all();
        $collections = Collection::all();
        $products_sale = Product::orderBy('created_at', 'DESC')->where('sale', '>', 0)->where('status', 1)->get();
        $products_new = Product::orderBy('created_at', 'DESC')->where('new', '=', 1)->where('status', 1)->get();
        $products = Product::orderBy('created_at', 'DESC')->where('status', 1)->paginate(16);
        return view('user.flower.home')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('collections', $collections)
            ->with([
                'products_sale' => $products_sale,
                'products_new' => $products_new,
                'countItemCart' => $countItemCart,
                'content' => $content,
                'total' => $total
            ]);
    }


    // Tra ve view list product.
    public function listProduct()
    {
        // Giỏ hàng
        $content = Cart::content();
        $countItemCart = Cart::count();
        $total = Cart::subtotal();

        $categories = Category::all();
        $collections = Collection::all();
        $selected_categoryId = 0;
        $product_filter = Product::where('status', 1);
        if (Input::has('categoryId') && Input::get('categoryId') != 0) {
            $selected_categoryId = Input::get('categoryId');
            $product_filter = $product_filter->where('categoryId', $selected_categoryId);
        }

        $selected_collectionId = 0;
        if (Input::has('collectionId') && Input::get('collectionId') != 0) {
            $selected_collectionId = Input::get('collectionId');
            $product_filter = $product_filter->where('collectionId', $selected_collectionId);
        }
        $selected_category = Category::find($selected_categoryId);
        $selected_collection = Collection::find($selected_collectionId);
        $list_product = $product_filter->orderBy('created_at', 'DESC')->paginate(12);
        return view('user.flower.product-list')->with([
            'categories' => $categories,
            'products' => $list_product,
            'collections' => $collections,
            'countItemCart' => $countItemCart,
            'content' => $content,
            'total' => $total,
            'selected_categoryId' => $selected_categoryId,
            'selected_category' => $selected_category,
            'selected_collection' => $selected_collection,
            'selected_collectionId' => $selected_collectionId,
        ]);
    }

    // Thêm vào giỏ hàng
    public function productBuy($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->sale == 0) {
            $itemCart = Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => array('img' => $product->images)));
        } else {
            $itemCart = Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->sale,
                'options' => array('img' => $product->images)));
        }
        $cartItem = Cart::get($itemCart->rowId);
        $total = Cart::subtotal();
        $countItem = Cart::count();
        $content = Cart::content();
        return response()->json([
            'item' => $cartItem,
            'count' => $countItem,
            'total' => $total,
            'cart' => $content], 200);
    }

    // Trả về view giỏ hàng
    public function getCart()
    {
        $content = Cart::content();
        $categories = Category::all();
        $collections = Collection::all();
        $countItemCart = Cart::count();
        $total = Cart::subtotal();

        return view('user.flower.cart')->with([
            'categories' => $categories,
            'collections' => $collections,
            'content' => $content,
            'total' => $total,
            'countItemCart' => $countItemCart
        ]);
    }


    // Xóa 1 sản phẩm trong giỏ hàng.
    public function productDelete($rowid)
    {
        Cart::remove($rowid);
        return redirect()->back()->with(['delete' => 'Đã xóa thành công']);
    }

    // Update sản phẩm trong giỏ hàng
    public function updateProductInCart()
    {
        if (Request::ajax()) {
            $rowId = Input::get('rowId');
            $qty = Input::get('qty');
            Cart::update($rowId, $qty);
            $content = Cart::get($rowId);
            return response()->json(['item' => $content], 200);
        }
    }

    // Trả về view Sản phẩm chi tiết.

    public function getProductDetail($id)
    {
        // Giỏ hàng
        $content = Cart::content();
        $countItemCart = Cart::count();
        $total = Cart::subtotal();

        $categories = Category::all();
        $collections = Collection::all();
        $product = Product::where('id', $id)->first();
        $categoryId = $product->categoryId;
        $productRelate = Product::where('categoryId', $categoryId)->orderBy('created_at', 'DESC')->get();
        return view('user.flower.productDetail')->with([
            'product' => $product,
            'categories' => $categories,
            'collections' => $collections,
            'countItemCart' => $countItemCart,
            'content' => $content,
            'total' => $total,
            'productRelate' => $productRelate
        ]);
    }
}