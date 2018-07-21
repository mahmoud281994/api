<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/products','productController');
Route::group(['prefix'=>'products'],function()
{
Route::apiResource('{product}/reviews','reviewController');
});