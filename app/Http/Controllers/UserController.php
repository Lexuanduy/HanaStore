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
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Webpatser\Uuid\Uuid;

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
        return view('user.flower.home')->with('categories', $categories)->with('products', $products)->with('collections', $collections)->with(['products_sale' => $products_sale, 'products_new' => $products_new, 'countItemCart' => $countItemCart, 'content' => $content, 'total' => $total]);
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
        return view('user.flower.product-list')->with(['categories' => $categories, 'products' => $list_product, 'collections' => $collections, 'countItemCart' => $countItemCart, 'content' => $content, 'total' => $total, 'selected_categoryId' => $selected_categoryId, 'selected_category' => $selected_category, 'selected_collection' => $selected_collection, 'selected_collectionId' => $selected_collectionId,]);
    }

    // Thêm vào giỏ hàng
    public function productBuy($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->sale == 0) {
            $itemCart = Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => array('img' => $product->images)));
        } else {
            $itemCart = Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->sale, 'options' => array('img' => $product->images)));
        }
        $cartItem = Cart::get($itemCart->rowId);
        $total = Cart::subtotal();
        $countItem = Cart::count();
        $content = Cart::content();
        return response()->json(['item' => $cartItem, 'count' => $countItem, 'total' => $total, 'cart' => $content], 200);
    }

    // Trả về view giỏ hàng
    public function getCart()
    {
        $content = Cart::content();
        $categories = Category::all();
        $collections = Collection::all();
        $countItemCart = Cart::count();
        $total = Cart::subtotal();

        return view('user.flower.cart')->with(['categories' => $categories, 'collections' => $collections, 'content' => $content, 'total' => $total, 'countItemCart' => $countItemCart]);
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
        return view('user.flower.productDetail')->with(['product' => $product, 'categories' => $categories, 'collections' => $collections, 'countItemCart' => $countItemCart, 'content' => $content, 'total' => $total, 'productRelate' => $productRelate]);
    }

    // Insert gio hang vao database
    public function checkoutCart()
    {
        if (Count(Cart::content()) > 0) {
            try {
                DB::beginTransaction();
                $cart = Cart::content();
                $ship_name = Input::get('ship-name');
                $ship_email = Input::get('ship-email');
                $ship_phone = Input::get('ship-phone');
                $ship_address = Input::get('ship-address');
                $note = Input::get('note');

                $customer = new Customer();
                $idCus = $customer->id = Uuid::generate(4)->string;
                $customer->name = 'SlowVs2L';
                $customer->email = 'quocviet.hn98@gmail.com';
                $customer->save();

                $order = new Order();
                $idOr = $order->id =  Uuid::generate(4)->string;
                $order->customerId =$idCus;
                $order->totalPrice = Cart::subtotal(0,'','');
                $order->shipName = $ship_name;
                $order->shipEmail = $ship_email;
                $order->shipAddress = $ship_address;
                $order->shipPhone = $ship_phone;
                $order->note = $note;
                $order->save();
                foreach ($cart as $item) {
                    $product = Product::find($item->id);
                    if ($product == null || $product->status != 1) {
                        // Chỗ này phải return về view error 404
                        return 'Xảy ra lỗi!';
                    }
                    $qty = $item->qty;
                    $order_detail = new OrderDetail();
                    $order_detail->orderId = $idOr;
                    $order_detail->productId = $product->id;
                    $order_detail->quantity = $qty;
                    $order_detail->unitPrice = $product->price;
                    $order_detail->save();
                }
                $order->save();
                DB::commit();
                Cart::destroy();
                return redirect()->route('giohang');
            } catch (\Exception $exception) {
                // return view error ở chỗ này
                DB::rollBack();
                return 'Có lỗi xảy ra.' . $exception->getMessage();
            }
        }
    }
}