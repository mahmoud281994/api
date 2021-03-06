<?php

use Faker\Generator as Faker;

$factory->define(App\Model\product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'detail'=>$faker->paragraph,
        'price'=>$faker->numberBetween(100,1000),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(2,10),
        'user_id'=>function(){
        	return App\User::all()->random();
        }
    ];
});
