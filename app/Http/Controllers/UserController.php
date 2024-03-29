<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use App\Models\Notification;
use App\Models\Offer;
use App\Models\Post;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Levels::all();
        return view('user.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'image' => ['required', 'mimes:jpg,png,jpg', 'max:5048'],
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images/users'), $newImageName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image_path = $newImageName;
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function show(User $user)
    {
        Paginator::useBootstrap();
        $completed_offers = Offer::where('user_id', auth()->user()->id)->where('completed', 1)->count();
        $approved_posts = Post::where('user_id', auth()->user()->id)->where('status', 1)->count();
        $notifications = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(6);
        return view('user.account', compact('user',  'posts', 'notifications', 'approved_posts', 'completed_offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Paginator::useBootstrap();
        $completed_offers = Offer::where('user_id', auth()->user()->id)->where('completed', 1)->count();
        $approved_posts = Post::where('user_id', auth()->user()->id)->where('status', 1)->count();
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(6);
        $levels = Levels::all();
        return view('user.edit', compact('user', 'levels', 'posts', 'approved_posts', 'completed_offers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        if ($request->hasFile('image')) {

            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $image = $request->file('image');

            $imagePath = public_path('images/users/' . $newImageName);
            Image::make($image)->resize(300, 300)->save($imagePath);

            $request->image->move(public_path('images/users'), $newImageName);

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'level_id' => $request->input('level_id'),
                'image_path' => $newImageName,
            ]);
        } else {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'level_id' => $request->input('level_id'),
            ]);
        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
