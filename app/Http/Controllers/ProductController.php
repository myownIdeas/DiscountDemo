<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Repository\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function __construct(){
       // $this->middleware('auth');
    }
    public function showProducts(Request $request){
        $products = Product::all();
        return view('product')->with('products',$products);
    }

    public function addToCart(Request $request){
        $product = Product::find($request->get('product_id'));
        DB::table('cart')->insert([
            'category_id'=> $product->category,
            'price'=> $product->price,
            'session_id'=>$request->session()->get('user_id'),
            'product_id'=>$request->get('product_id')
        ]);
        return 'true';
    }
    public function showCart(Request $request){
        $items = Cart::where('session_id',$request->session()->get('user_id'))->get();
        return view('cart')->with('products',$items);
    }
    public function placeOrder(Discount $discount,Request $request){
        try{
            $items = Cart::where('session_id',$request->session()->get('user_id'))->get();
            $discount->applyDiscountAndPlaceOrder($items,$request->session()->get('user_id'));
            \Session::flash('message', 'Your Order Has Been Added Successfully !');
            return redirect('products');
        }
        catch(\Exception $e){
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'Some thing went wrong with the order please try again !');
            return redirect('products');
        }

    }
}
