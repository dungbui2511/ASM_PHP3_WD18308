<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searched(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');
        $posts = Post::select('posts.*')
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
        ->where('posts.title', 'LIKE', "%{$query}%")
        ->orWhere('posts.content', 'LIKE', "%{$query}%")
        ->orWhere('tags.name', 'LIKE', "%{$query}%")
        ->orWhere('categories.name', 'LIKE', "%{$query}%")
        ->distinct()
        ->get();
        $trendingPosts = Post::orderBy('updated_at', 'desc')->take(3)->get();
        return view('results', compact('posts','query','categories','trendingPosts'));
    }
}
