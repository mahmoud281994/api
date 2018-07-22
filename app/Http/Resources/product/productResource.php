<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'describtion'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock ==0?'out of stock':$this->stock,
            'discount'=>$this->discount,
            'total_price'=>round((1-($this->discount/100))*$this->price),
            'rating'=>$this->review->count()>0?round($this->review->sum('star')/$this->review->count()):'no rating yet',
            'href'=>[
                'reviews'=>route('reviews.index',$this->id)  
            ]
        ];

    }
}
