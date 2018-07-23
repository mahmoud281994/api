<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $fillable =[
    		'name','detail','price','stock','discount'
    	];
    public function review ()
    {
    	
    	return $this->hasMany(review::class);
    }
}
