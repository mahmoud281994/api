<?php

namespace App\Http\Controllers;

use App\Model\product;
use Illuminate\Http\Request;
use App\Http\Resources\product\productResource;
use App\Http\Resources\product\productCollection;
use App\Http\Resources\reviewResources;
use App\Http\Requests\productRequest;


class ProductController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return productCollection::collection(product::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
        $product = new product;
        $product->name = $request->name;
        $product->detail= $request->description;
        $product->stock= $request->stock;
        $product->price= $request->price;
        $product->discount= $request->discount;
        $product->save();
       return Response([
        'date' => new productResource($product)
       ]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return new productResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $request['detail']= $request->description;
        unset($request->description);
        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
    }
}
