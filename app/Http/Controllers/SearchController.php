<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function store(request $request){
$category=$request->input('category');
$subcategory=$request->input('subcat');
$brand=$request->input('brand');
$minprice=$request->input('minprice');
$minprice=str_replace(",","",$minprice);
$maxprice=$request->input('maxprice');
$maxprice=str_replace(",","",$maxprice);
if($maxprice==0){
    $maxprice=500000;
}




if(($subcategory!="0" )&&($brand=="0")){
    $products=DB::table('products')
    ->where('category_id',$category)
    ->whereBetween('current_price',[$minprice,$maxprice])->paginate(30);

}if(($brand=='0')&&($subcategory!='0')){
    $products=DB::table('products')
    ->where('category_id',$category)
    ->where('subcategory_id',$subcategory)
   
    ->whereBetween('current_price',[$minprice,$maxprice])->paginate(30);
    
}else{
    $products=DB::table('products')
    ->where('category_id', $category)
    ->where('subcategory_id', $subcategory)
    ->where('brand_id', $brand)
    ->whereBetween('current_price', [$minprice,$maxprice])->paginate(30);
}
//dd($maxprice);


        $brands=DB::table('brands')->inRandomOrder()->paginate(20);
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(20);
        $index = 0;
        $categories = DB::table('maincategories')->get();

        $categoryCount = categoryCount();
        return view('affiliate.customsearch',compact('categoryCount','products','brands','index','categories','subcats'));

    }
}
