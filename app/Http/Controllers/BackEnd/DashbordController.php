<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Page;
use App\Post;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    public function index()
    {
        $category = Category::all();
        $post = Post::all();
        $page = Page::all();
        $comments = Comment::orderby("created_at" , "desc")->get();
        return view('BackEnd.dashbord' , compact('category' , 'post' , 'page' , 'comments'));
        return redirect()->back();
    }

}
