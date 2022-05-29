<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function addCart(Request $request)
    {
        $input = $request->all();

        $item = Image::with(['color', 'product'])->where('color_id', '=', $input['color_id'])
            ->where('product_id', '=', $input['product_id'])->first();
        $category = Product::with('category')->where('products.id', '=', $input['product_id'])->first();

        $cart = session()->has('cart') ? session()->get('cart', []) : [];

        if (!array_key_exists($item->product_id . '-' . $item->color_id, $cart)) {
            $cart[$item->product_id . '-' . $item->color_id] = [
                'product_id' => $item->product_id,
                'product_name' => $item->product->product_name,
                'color_id' => $item->color_id,
                'color_name' => $item->color->color_name,
                'quantity' => isset($input['qty']) ? $input['qty'] : 1,
                'price' => $item->product->price,
                'src' => $item->src,
                'category_name' => $category->category->category_name
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['total' => self::totalPrice($cart), 'cart' => Session::get('cart')]);
    }

    public function deleteItem(Request $request)
    {
        $input = $request->all();
        $cart = session()->has('cart') ? session()->get('cart', []) : [];

        unset($cart[$input['key']]);

        session()->put('cart', $cart);

        return response()->json(['total' => self::totalPrice($cart), 'cart' => Session::get('cart')]);
    }

    public function updateCart(Request $request)
    {
        $input = $request->all();

        $item = Image::with(['color', 'product'])->where('color_id', '=', $input['color_id'])
            ->where('product_id', '=', $input['product_id'])->first();
        $category = Product::with('category')->where('products.id', '=', $input['product_id'])->first();

        $cart = session()->has('cart') ? session()->get('cart', []) : [];

        if (!array_key_exists($item->product_id . '-' . $item->color_id, $cart)) {

            $cart[$item->product_id . '-' . $item->color_id] = [
                'product_id' => $item->product_id,
                'product_name' => $item->product->product_name,
                'color_id' => $item->color_id,
                'color_name' => $item->color->color_name,
                'quantity' => isset($input['qty']) ? $input['qty'] : 1,
                'price' => $item->product->price,
                'src' => $item->src,
                'category_name' => $category->category->category_name
            ];
        }
        else{
            if ($input['qty'] == 0) {
                unset($cart[$item->product_id . '-' . $item->color_id]);
            }else{
                $cart[$item->product_id . '-' . $item->color_id]['quantity'] = $input['qty'];
            }
        }
        
        session()->put('cart', $cart);

        return response()->json(['total' => self::totalPrice($cart), 'cart' => Session::get('cart')]);
    }

    public static function totalPrice($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function callCart(Request $request){
        $input = $request->all();
        $cart = Session::get('cart');
        $item = $cart[$input['product_id']. '-' . $input['color_id']]; 
        return response()->json(['totalPrice' => self::totalPrice(Session::get('cart')), 'totalItemPrice' => ($item['price'] * $item['quantity'])]);
    }
    public static function totalQuantity($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }
}
