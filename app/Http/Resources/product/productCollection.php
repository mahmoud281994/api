<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\Resource;

class productCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'total_price'=>round((1-($this->discount/100))*$this->price),
            'rating'=>$this->review->count()>0?round($this->review->sum('star')/$this->review->count()):'no rating yet',
            'discount'=>$this->discount,
            'href'=>[
                'link'=>route('products.show',$this->id),
            ]
        ];
    }
}
