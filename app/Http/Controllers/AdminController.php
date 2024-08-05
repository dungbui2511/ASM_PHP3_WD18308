<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MyPage;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $req)
    {
        return view('admin.admin',['page_title'=>'Dashboard']);
    }
    public function posts(Request $req,$type ='',$id='')
    {
        switch($type){
            case 'add':
                if($req->method() == 'POST')
                {
                    $post = new Post();
                    $validated = $req->validate([
                        'title' => 'required|string',
                        'file'=> 'required|image',
                        'content' => 'required',
                        'tag_id' => 'required',
                        'category_id' => 'required'
                    ]);
                    $path = $req->file('file')->store('/',['disk'=>'my_disk']);
                    $data['title'] = $req->input('title');
                    $data['category_id'] = $req->input('category_id');
                    $data['tag_id'] = $req->input('tag_id');
                    $data['image'] = $path;
                    $data['content'] = $req->input('content');
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $post->insert($data);
                    return redirect()->back()->with('success', 'Post created successfully!');
                }
                $categories = Category::all();
                $tags = Tag::all();
                return view('admin.add_post', [
                    'page_title' => 'New Post',
                    'categories' => $categories,
                    'tags' => $tags
                ]);
                break;
            case 'edit':
                $post = Post::find($id);
                $categories = Category::all();
                $tags = Tag::all();
                if ($req->method() == 'POST') {
                    $validated = $req->validate([
                        'title' => 'required|string',
                        'file' => 'image',  // file is optional and must be an image if provided
                        'content' => 'required',
                        'category_id' => 'required',
                        'tag_id' => 'required'
                    ]);
                    $data['title'] = $req->input('title');
                    $data['content'] = $req->input('content');
                    $data['category_id'] = $req->input('category_id');
                    $data['tag_id'] = $req->input('tag_id');
                    $data['updated_at'] = now();
            
                    if ($req->hasFile('file')) {
                        // Remove old image if exists
                        if (file_exists(storage_path('app/public/' . $post->image))) {
                            unlink(storage_path('app/public/' . $post->image));
                        }
                        $path = $req->file('file')->store('/', ['disk' => 'my_disk']);
                        $data['image'] = $path;
                    }
            
                    $post->update($data);
            
                    return redirect()->back()->with('success', 'Post updated successfully!');
                }
                return view('admin.edit_post',[
                       'page_title'=>'Edit Post',
                       'post' => $post,
                       'categories' => $categories,
                       'tags' => $tags
                ]);
                return view('admin.edit_post', ['page_title' => 'Edit Post']);
            break;
            case 'delete':
                $post = new Post();
                $row = $post->find($id);
                $category = $row->category();
                if($req->method() == 'POST')
                {
                    $row->delete();
                    return redirect('admin/posts');
                }
                return view('admin.delete_post',[
                    'page_title'=>'Delete Post',
                    'row' => $row,
                    'category' => $category
            ]);
            break;
            default:
                $post = new Post();
                $limit = 3;
                $page = $req->input('page') ? (int)$req->input('page') : 1;
                $offset = ($page-1) * $limit;
                $page_class = new MyPage();
                $links = $page_class->make_links($req->fullUrlWithQuery(['page'=>$page]),$page,1);
                $query = "SELECT posts.*, categories.name, GROUP_CONCAT(tags.name SEPARATOR ', ') as tag_names 
            FROM posts 
            JOIN categories ON posts.category_id = categories.id 
            JOIN tags ON posts.tag_id = tags.id 
            GROUP BY posts.id, categories.name 
            LIMIT $limit OFFSET $offset";
                $rows = DB::select($query);
                $data['rows'] = $rows;
                $data['page_title'] = 'Posts';
                $data['links'] = $links;
                return view('admin.posts',$data);
            break;
        }
    }
    public function categories(Request $req,$type = '',$id ='')
    {
        switch($type){
            case 'add':
                if($req->method() == 'POST')
                {
                    $category = new Category();
                    $validated = $req->validate([
                        'name' => 'required|string',
                    ]);
                    $data['name'] = $req->input('name');
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $category->insert($data);   
                }
                return view('admin.add_category',['page_title'=>'New Category']);
            break;
            case 'edit':
                $cate = new Category();
                $row = $cate->find($id);
                if ($req->method() == 'POST') {
                    $validated = $req->validate([
                        'name' => 'required|string',
                    ]);
                    $data['name'] = $req->input('name');
                    $data['updated_at'] = date('Y-m-d H:i:s'); 
                    $cate->where('id',$id)->update($data);
                    return redirect('admin/categories/edit/'.$id);
                }
                return view('admin.edit_category',[
                        'page_title'=>'Edit Category',
                        'row' => $row,
                ]);
                return view('admin.edit_post', ['page_title' => 'Edit Post']);
            break;
            case 'delete':
                $category = new Category();
                $row = $category->find($id);
                if($req->method() == 'POST')
                {
                    $row->delete();
                    return redirect('admin/categories');
                }
                return view('admin.delete_category',[
                    'page_title'=>'Delete Category',
                    'row' => $row,
            ]);
            break;
            default:
            $query = "select * from categories order by id desc";
            $rows = DB::select($query);
            $data['rows'] = $rows;
            $data['page_title'] = 'Categories';
            return view('admin.categories',$data);
            break;
    }
    }
    public function tags(Request $req, $type = '', $id = '')
    {
        switch ($type) {
            case 'add':
                if ($req->method() == 'POST') {
                    $tag = new Tag();
                    $validated = $req->validate([
                        'name' => 'required|string',
                    ]);
                    $data['name'] = $req->input('name');
                    $data['created_at'] = now();
                    $data['updated_at'] = now();
                    $tag->insert($data);
                    return redirect()->back()->with('success', 'Tag created successfully!');
                }
                return view('admin.add_tag', ['page_title' => 'New Tag']);
                break;
    
            case 'edit':
                $tag = Tag::find($id);
                if ($req->method() == 'POST') {
                    $validated = $req->validate([
                        'name' => 'required|string',
                    ]);
                    $data['name'] = $req->input('name');
                    $data['updated_at'] = now();
                    $tag->update($data);
                    return redirect('admin/tags/edit/'.$id)->with('success', 'Tag updated successfully!');
                }
                return view('admin.edit_tag', [
                    'page_title' => 'Edit Tag',
                    'row' => $tag,
                ]);
                break;
    
            case 'delete':
                $tag = Tag::find($id);
                if ($req->method() == 'POST') {
                    $tag->delete();
                    return redirect('admin/tags')->with('success', 'Tag deleted successfully!');
                }
                return view('admin.delete_tag', [
                    'page_title' => 'Delete Tag',
                    'row' => $tag,
                ]);
                break;
    
            default:
                $tags = Tag::orderBy('id', 'desc')->get();
                return view('admin.tags', [
                    'page_title' => 'Tags',
                    'rows' => $tags,
                ]);
                break;
        }
    }
    
}
