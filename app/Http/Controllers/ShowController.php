<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class ShowController extends Controller
{

    public function offer()
    {
        $user_offers = Offer::join('posts', 'posts.id', '=', 'offers.post_id')
            ->select('posts.*', 'offers.id', 'offers.post_id', 'offers.user_id', 'offers.price')
            ->where('posts.user_id', auth()->user()->id)->get();
        return view('offer.user', compact('user_offers'));
    }

    public function ratings_user($user_id)
    {
        $user_ratings = Rating::with('user')->where('user_id', $user_id)->get();
        return view('rating.worker_rating', compact('user_ratings'));
    }

    public function user_posts()
    {
        $user_posts = Post::join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.*', 'posts.*')
            ->where('users.id', auth()->user()->id)->get();

        $done_posts = Post::join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.*', 'posts.*')
            ->where('users.id', auth()->user()->id)
            ->where('posts.completed', 1)->get();
        return view('posts.user', compact('user_posts','done_posts'));
    }
    public function connections($user_id)
    {
        $user = User::find($user_id);
        return view('user.connections', compact('user'));
    }

    public function manage_posts(){
        $posts = Post::where('status',0)->get();
        return view('posts.manage_post', compact('posts'));
    }

    public function completed_offers(){
        $offers = Offer::where('completed',1)->get();
        return view('offer.completed_offers', compact('offers'));
    }
}
