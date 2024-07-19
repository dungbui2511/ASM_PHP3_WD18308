<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostByCateController extends Controller
{
    public function show($cate_id){
        $categories = Category::all();
        $postByCate = Post::where('category_id',$cate_id)->get();
        $trendingPosts = Post::orderBy('updated_at', 'desc')->take(3)->get();
        $cateName = Category::where('id', $cate_id)->firstOrFail()->name;
        // Trả về view hiển thị danh sách bài viết theo danh mục
        return view('post-by-cate', compact('postByCate','categories','cateName','trendingPosts'));
    }
}
