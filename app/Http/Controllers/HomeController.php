<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
class HomeController extends Controller
{
    public function index()
    {
        $randomPost = Post::inRandomOrder()->first();
        $categories = Category::all(); // Lấy tất cả các category từ cơ sở dữ liệu
        $trendingPosts = Post::orderBy('updated_at', 'desc')->take(3)->get();
        $popularPost = Post::inRandomOrder()->first();
        $posts = Post::paginate(3);
        return view('home', compact('categories','randomPost','trendingPosts','popularPost','posts'));
    }
}
