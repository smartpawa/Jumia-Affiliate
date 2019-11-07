<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class NewProducts extends Controller
{
public function store(Request $request){
     
    $this -> validate($request, [
        'product_name'=>'required',
        'affiliate_url'=>'required',
        'product_image_url'=>'required',
        'former_price'=>'required',
        'current_price'=>'required',
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'seller'=>'required',
        'visits'=>'required',
        'brand_id'=>'required',
    ]);
    $products = new Product;
    $products->product_name=$request->input('product_name');
    //$products->user_id=Auth::user()->id;
    $products->affiliate_url=$request->input('affiliate_url');
    $products->product_image_url=$request->input('product_image_url');
    $products->former_price=$request->input('former_price');
    $products->current_price=$request->input('current_price');
    $products->category_id=$request->input('category_id');
    $products->subcategory_id=$request->input('subcategory_id');
    $products->seller=$request->input('seller');
    $products->visits=$request->input('visits');
    $products->brand_id=$request->input('brand_id');

  //  dd($products);
    
    $products->save();
    
    return redirect('/all')->with('response','Post Added Successfully');
}
}
