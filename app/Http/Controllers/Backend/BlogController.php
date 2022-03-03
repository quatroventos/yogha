<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Blog::all();
        return view('admin.blog.index', compact('posts'));
    }

    public function edit(Request $request)
    {
        $cats = BlogCategories::all();
        return view('admin.blog.edit',compact('cats'));
    }

    /**
     * Cria novo Post
     *
     * @param  array  $data
     * @return \App\Models\Blog
     */
    protected function create(Request $request)
    {

        //armazena arquivo no dir public
        if ($image = $request->file('image')) {
            $destinationPath = 'files/blog_posts/';
            $imagefile = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imagefile);
        }else{
            $imagefile = '';
        }

        $post = new Blog;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->image = $imagefile;
        $post->save();

        return redirect()->back()->with('success', 'Post cadastrado!');
    }


    //categorias

    public function cat_index()
    {
        $cats = BlogCategories::all();

        return view('admin.blog.index_cat', compact('cats'));
    }

    public function edit_cat(Request $request)
    {
        return view('admin.blog.edit_cat');
    }

    /**
     * Cria nova categoria
     *
     * @param  array  $data
     * @return \App\Models\BlogCategories
     */
    protected function create_cat(Request $request)
    {

        $post = new BlogCategories();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->save();

        return redirect()->back()->with('success', 'Categoria cadastrada!');
    }
}
