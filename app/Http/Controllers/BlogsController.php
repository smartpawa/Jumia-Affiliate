<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{


    public function index()
    {
        $blogs = DB::table('blogs')->paginate(10);
        $popular = DB::table('blogs')->orderBy('blog_views', 'DESC')->get();
        return view('affiliate.blog', compact('blogs', 'popular'));
    }


    public function show($slug)
    {
        $article = DB::table('blogs')->where('slug', $slug)->first();
        $views = $article->blog_views + 1;
        DB::table('blogs')->where('slug', $slug)->update(['blog_views' => $views]);
        $popular = DB::table('blogs')->orderBy('blog_views', 'DESC')->get();
        return view('affiliate.article', compact('article', 'popular'));
    }
}
