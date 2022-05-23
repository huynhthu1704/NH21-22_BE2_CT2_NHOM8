<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartList()
    {

        return view('cart', compact('cartItems'));
    }
    public function addCart(Request $request)
    {
        $input = $request->all();

        $item = Image::with(['color', 'product'])->where('color_id', '=', $input['color_id'])
            ->where('product_id', '=', $input['product_id'])->first();

        $cart = session()->has('cart') ? session()->get('cart') : [];
 
        if (!array_key_exists($item->product_id . '-' . $item->color_id, $cart)) {
            $cart[$item->product_id . '-' . $item->color_id] = [
                'title' => $item->product->product_name,
                'color_id' => $item->color_id,
                'quantity' => 1,
                'price' => $item->product->price,
                'src' => $item->src
            ];
        }

        session(['cart' => $cart]);
        session()->flash('message', $item->product->product_name . ' added to cart.');

        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];

        return response()->json($data);
    }
}
