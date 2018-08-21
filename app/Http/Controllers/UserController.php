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

class UserController extends Controller
{
    // Lấy ra sản phẩm từ database trả về view bên User
    public function getIndexUser()
    {
        $categories = Category::all();
        $collections = Collection::all();
        $products_sale = Product::orderBy('created_at', 'DESC')->where('sale', '>', 0)->get();
        $products_new = Product::orderBy('created_at', 'DESC')->where('new', '=', 1)->get();
        $products = Product::orderBy('created_at', 'DESC')->where('status', 1)->paginate(16);
        return view('user.flower.home')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('collections', $collections)
            ->with([
                'products_sale' => $products_sale,
                'products_new' => $products_new
            ]);
    }


    // Thêm vào giỏ hàng
    public function productBuy($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->sale == 0) {
            Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => array(
                    'img' => $product->images
                )
            ));
        }else{
            Cart::instance('cart')->add(array(
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->sale,
                'options' => array(
                    'img' => $product->images
                )
            ));
        }
        return redirect()->route('giohang');
    }

    // Trả về view giỏ hàng
    public function getCart()
    {
        $content = Cart::content();
        $categories = Category::all();
        $collections = Collection::all();
        $total = Cart::total();

        return view('user.flower.cart')
            ->with([
                'categories' => $categories,
                'collections' => $collections,
                'content' => $content,
                'total' => $total
            ]);
    }

    public function productDelete($rowid)
    {
        Cart::remove($rowid);
        return redirect()->back()->with(['delete'=>'Đã xóa thành công']);
    }


}