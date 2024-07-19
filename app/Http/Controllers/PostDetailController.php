<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    public function show($id)
    {
    $categories = Category::all();
    // Lấy thông tin bài viết theo ID
    $post = Post::findOrFail($id);
    // Truyền thông tin bài viết tới view 'post-detail'
    return view('post-detail', compact('post','categories'));
    }
}
