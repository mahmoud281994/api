<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResourse('/products','productController');
Route::group(['prefix'=>'products'],function()
{
Route::apiResourse('{product}/reviews','reviewController');
});