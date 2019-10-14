<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


function categoryCount(){
 $categories = DB::table('maincategories')->get();
 foreach ($categories as $category) {
     $categoryID = $category->id;
     $categoryCount[] = DB::table('products')->where('category_id', $categoryID)->count();
 }

 return $categoryCount;
}
