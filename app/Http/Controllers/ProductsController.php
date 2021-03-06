<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    public function filterProducts(Request $request)
    {
        $cat_id = $request->id;
        $parameter = $request->parameter;
        if ($parameter == 0) {
            $products = DB::table('products')->where('category_id', $cat_id)->paginate(40);

        }

        if ($parameter == 1) {
            $products = DB::table('products')->where('category_id', $cat_id)->orderBy('visits', 'DESC')->paginate(40);

        }
        if ($parameter == 2) {
            $products = DB::table('products')->where('category_id', $cat_id)->orderBy('current_price', 'ASC')->paginate(40);

        }
        if ($parameter == 3) {
            $products = DB::table('products')->where('category_id', $cat_id)->orderBy('current_price', 'DESC')->paginate(40);

        }

        return view('affiliate.filtered', compact('products'));
    }

    public function index()
    {
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(20);
        $index = 0;
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        $categories = DB::table('maincategories')->get();
        $categoryCount = categoryCount();
        $trendingProducts = DB::table('products')->orderBy('visits', 'DESC')->paginate(8);
        return view('affiliate.index', compact('brands', 'subcats', 'categoryCount', 'trendingProducts', 'categories', 'index'));
    }
    public function products()
    {
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(20);
        $index = 0;
        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->paginate(20);

        $categoryCount = categoryCount();

        return view('affiliate.products', compact('brands', 'subcats', 'products', 'categories', 'categoryCount', 'index'));
    }

    public function show($slug)
    {
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(14);

        $index = 0;
        $categoryDetails = DB::table('maincategories')->where('category_slug', $slug)->first();
        $category = $categoryDetails->id;

        $subcategories = DB::table('subcategories')->where('parent_category_id', $category)->get();

        $name = $categoryDetails->category_name;
        $items = DB::table('products')->where('category_id', $category)->count();

        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->where('category_id', $category)->paginate(20);
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        //COUNT ITEMS IN CATEGORIES
        $categoryCount = categoryCount();
        $cat_id = $category;

        //dd($subcategories);
        return view('affiliate.category', compact('brands', 'subcats', 'cat_id', 'categoryCount', 'subcategories', 'products', 'categories', 'index', 'name', 'items'));
    }

    public function addVisitCount(Request $request)
    {

        $id = $request->id;
        DB::table('products')->where('id', $id)->increment('visits', 1);
    }

    public function popular()
    {
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->orderBy('visits', 'DESC')->paginate(20);
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        $categoryCount = categoryCount();

        return view('affiliate.popular', compact('brands', 'subcats', 'products', 'categories', 'categoryCount', 'index'));
    }

    public function cheapest()
    {
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->orderBy('current_price', 'ASC')->paginate(20);
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        $categoryCount = categoryCount();

        return view('affiliate.popular', compact('brands', 'subcats', 'products', 'categories', 'categoryCount', 'index'));
    }

    public function search(Request $request)
    {$subcats = DB::table('subcategories')->inRandomOrder()->paginate(40);
        $keyword = $request->input('search');
        $index = 0;
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        //return $request->input('search');
        $index = 0;
        $categories = DB::table('maincategories')->get();
        $keyword = $request->input('search');
        $products = Product::where('product_name', 'like', '%' . $keyword . '%')
            ->paginate(10);

        $products->appends(array('keyword' => $keyword));
        $categoryCount = array();
        foreach ($categories as $category) {
            $categoryID = $category->id;
            $categoryCount[] = DB::table('products')->where('category_id', $categoryID)->count();
        }
        return view('affiliate.searchproducts', compact('brands', 'keyword', 'subcats', 'products', 'categories', 'categoryCount', 'index'));

    }
    public function addToCart(Request $request)
    {
        return response()->json(['success' => 'Data is successfully added']);
        $grocery = new Article();
        $grocery->id = $request->id;
        $grocery->quantity = $request->quantity;

        $grocery->save();
        return response()->json(['success' => 'Data is successfully added']);
    }

    public function advancedSearch()
    {
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->orderBy('current_price', 'ASC')->paginate(20);
        $brands = DB::table('brands')->inRandomOrder()->paginate(20);
        $categoryCount = categoryCount();
        return view('affiliate.advancedsearch', compact('brands', 'subcats', 'products', 'categories', 'categoryCount', 'index'));

    }
    public function getSubCats(Request $request)
    {
        $categoryID = $request->category;

        $subcategories = DB::table('subcategories')->where('parent_category_id', $categoryID)->get();
        return view('affiliate.subcats', compact('subcategories'));
    }
    public function getBrands(Request $request)
    {
        $brandID = $request->brand;
        $brands = DB::table('brands')->where('subcategory_id', $brandID)->get();
        $subcategories = DB::table('subcategories')->inRandomOrder()->paginate(20);
        return view('affiliate.brands', compact('brands'));
    }

    public function addForm()
    {
        $subcategories = DB::table('subcategories')->orderBy('subcategory_name', 'ASC')->get();
        $index = 0;
        $categories = DB::table('maincategories')->orderBy('category_name', 'ASC')->get();

        $brands = DB::table('brands')->orderBy('brand_name', 'ASC')->get();
        $sellers =DB::table('sellers')->get();
        $categoryCount = categoryCount();
        if (Auth::check()) {
            return view('admin.new', compact('sellers','brands', 'subcategories', 'categories', 'categoryCount', 'index'));
        } else {
            return view('auth.login');
        }
    }

}
