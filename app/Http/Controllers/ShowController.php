<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Post;
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
}
