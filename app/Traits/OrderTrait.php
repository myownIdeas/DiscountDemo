<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 26/12/2020
 * Time: 10:49 PM
 */

namespace App\Traits;


use App\Cart;
use Illuminate\Support\Facades\DB;

trait OrderTrait
{
    public function placeOrder($price,$discount){
        return DB::table('order')->insertGetId([
            'price'=>$price,
            'discount'=>$discount
        ]);
    }

    public function orderDetail($orderId,$oneFree,$userId){
        return $this->insertOrderDetail($orderId,$this->getCartItems($userId,$oneFree),$userId);
    }

    public function getCartItems($userId,$oneFree){
        if($oneFree === 'true'){
            $this->updateCart($userId);
        }
        return Cart::where('session_id',$userId)->get();
    }

    public function insertOrderDetail($orderId,$itemes,$userId){
        $final = [];
        foreach($itemes as $items){
            $final[] = [
                'order_id'=>$orderId,
                'product_id'=>$items->product_id,
                'price'=>$items->price
            ];

        }
        DB::table('order_detail')->insert($final);
        Cart::where('session_id',$userId)->delete();
        return true;
    }

    public function updateCart($userId){
        $items = (Cart::where('session_id',$userId)->orderBy('price','ASC')->get())[0];
        DB::table('cart')->insert([
            "session_id" =>$items->session_id,
            "product_id" =>$items->product_id,
            "category_id" =>$items->category_id,
            "price" =>$items->price
        ]);
        return true;
    }
}