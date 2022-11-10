<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'post_text' => 'required|string|max:855',
            'category_id' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|digits:10',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->post_text = $request->post_text;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->save();
        foreach ($request->file('images') as $imagefile) {
            $image = new Image;
            $path = $imagefile->store('/images/resource', ['disk' => 'my_files']);
            $image->url = $path;
            $image->product_id = $post->id;
            $image->save();
        }
        return redirect()->route('posts.index')->with('success','The post has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = DB::table('posts')->where('user_id', $post->user_id)->get();
        $post = Post::with('images')->find($post->id);
        return view('posts.single_post', compact('post','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $images = Image::all();

        return view('posts.edit', compact('post', 'categories', 'images'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'post_text' => $request->input('post_text'),
            'category_id' => $request->input('category_id'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        if ($request->file('images')) {
            DB::table('images')->where('product_id', '=', $post->id)->delete();
            foreach ($request->file('images') as $imagefile) {
                $path = $imagefile->store('/images/resource', ['disk' => 'my_files']);
                $image = new Image;
                $image->url = $path;
                $image->product_id = $post->id;

                $image->save();
            }
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
