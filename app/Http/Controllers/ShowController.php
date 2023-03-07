<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        $user = User::findOrFail($user_id);
        $user_ratings = Rating::where('user_id', $user_id)->get();
        $avg_rating = Rating::where('user_id', $user_id)->avg('rating');
        $completed_offers = Offer::where('user_id', auth()->user()->id)->where('completed', 1)->count();
        return view('rating.worker_rating', compact('user_ratings', 'user', 'avg_rating', 'completed_offers'));
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
        $completed_offers = Offer::where('user_id', auth()->user()->id)->where('completed', 1)->count();
        $approved_posts = Post::where('user_id', auth()->user()->id)->where('status', 1)->count();
        $user = User::find($user_id);
        return view('user.connections', compact('user', 'completed_offers', 'approved_posts'));
    }

    public function manage_posts(){
        if (Gate::allows('manage_posts')) {
            $posts = Post::where('status',0)->get();
            return view('posts.manage_post', compact('posts'));
        } else {
            return redirect()->back();
        }
    }

    public function completed_offers(){
        if (Gate::allows('offer.completed')) {
            $offers = Offer::where('completed',1)->get();
            return view('offer.completed_offers', compact('offers'));
        } else {
            return redirect()->back();
        }
    }
}
