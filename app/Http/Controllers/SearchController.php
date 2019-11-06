<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function store(request $request){
        $brands=DB::table('brands')->inRandomOrder()->paginate(20);
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(20);
        $index = 0;
        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->paginate(20);

        $categoryCount = categoryCount();
        return view('affiliate.customsearch',compact('categoryCount','products','brands','index','categories','subcats'));


    }
}
