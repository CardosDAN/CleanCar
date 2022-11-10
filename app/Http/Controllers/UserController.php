<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use App\Models\Post;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;


class UserController extends Controller
{
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
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(6);
        return view('user.account', compact('user',  'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $levels = Levels::all();
        return view('user.edit', compact('user', 'levels'));
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
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level_id' => $request->input('level_id'),
            'image_path' => $request->input('image'),
        ]);
        if( $request->file('image')){
            DB::table('users')->where('image_path', '=', 'image')->update(array('image_path' => 'image'));
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images/users'), $newImageName);
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
