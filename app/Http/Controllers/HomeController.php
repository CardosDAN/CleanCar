<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\{Country, Offer, State, City};
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        $posts = Post::all();
        $categories = Category::all();
        return view('posts.posts',$data, compact('categories', 'posts'));
    }

    public function getAcceptedOffers()
    {
        if (Gate::allows('offer.accepted')) {
            $offers = Offer::where('user_id', auth()->user()->id)
                ->where('accepted', 1)
                ->get();
            return view('offer.acceptedOffer', compact('offers'));
        } else {
            return redirect()->back();
        }
    }

    public function fetchPosts(Request $request)
    {
        $category_id = $request->input('category_id');
        $city_id = $request->input('city_id');
        $posts = Post::where('category_id', $category_id)->where('city_id', $city_id)
            ->where('status', 1)
            ->where('completed', 0)
            ->with('images')
            ->get();
        return response()->json($posts);
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);

    }
}


