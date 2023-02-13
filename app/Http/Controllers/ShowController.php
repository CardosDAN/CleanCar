<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Post;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{

    public function offer(){
        $user_offers = Offer::join('posts', 'posts.id', '=', 'offers.post_id')
            ->select('posts.*', 'offers.id', 'offers.post_id', 'offers.user_id',  'offers.price')
            ->where('posts.user_id', auth()->user()->id)->get();
        return view('offer.user', compact('user_offers'));
    }

    public function ratings_user($user_id){
        $user_ratings = Rating::join('users', 'users.id', '=', 'ratings.user_id')
            ->select('users.*', 'ratings.id', 'ratings.user_id', 'ratings.rating', 'ratings.comment')
            ->where('users.id', $user_id)->get();
        return view('rating.worker_rating', compact('user_ratings'));
    }
}
