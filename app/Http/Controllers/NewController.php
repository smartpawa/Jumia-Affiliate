<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if (Auth::check()) {
        $products=DB::table('products')->orderBy('id','DESC')->paginate(1000);
        return view('admin.index',compact('products'));}
        else{
            return view('auth.login');
        }
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
    public function store(Request $request)
    {
        if (Auth::check()) {
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
        
            return redirect('/new')->with('response', 'Post Added Successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $product=DB::table('products')->where('id', $id)->first();
            return view('admin.edit', compact('product'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            DB::table('products')->where('id', $id)->delete();
            return redirect('/new');
        }else{
            return view('auth.login');
        }
    }
}
