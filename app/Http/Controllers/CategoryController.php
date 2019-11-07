<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function categrory(){
        return view('affiliate.categories');
    }

    public function addCategory(Request $request){
        $this->validate($request, [
            'category' => 'required'

        ]);
        $category = new Category;
        $category->category=$request->input('category');
        $category->save();
        return redirect('/category')->with('response','Category Added Successfully');
    }
}
