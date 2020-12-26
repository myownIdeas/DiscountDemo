<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 26/12/2020
 * Time: 9:24 PM
 */

namespace App\Repository;


use App\Traits\OrderTrait;
use Illuminate\Support\Collection;

class Discount
{
    use OrderTrait;
    public function applyDiscountAndPlaceOrder($items,$userId){
        $collection = collect($items);
        $price = $collection->sum('price');
        $catCount = $collection->countBy('category_id');
        $discount = 0.00;
        $oneFree = 'false';
        if($price > 1000){
          $discount = (($price *10) / 100);
          $price = $price - $discount;
        }
        else if((isset($catCount[1])) && $catCount[1] >= 2){
            $minProductPrice =  $collection->where('category_id',1)->min('price');
            $discount = (($minProductPrice *20) / 100);
            $price = $price - $discount;
        }
        else if((isset($catCount[2])) && $catCount[2] >= 5){
           $oneFree = 'true';
        }
        $orderId = $this->placeOrder($price,$discount);
        return $this->orderDetail($orderId,$oneFree,$userId);
    }
}