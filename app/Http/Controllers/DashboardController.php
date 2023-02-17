<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $posts_count = Post::count();
        $offers_count = Offer::count();
        $rating_count = Rating::count();
        return view('index', compact('user_count', 'posts_count', 'offers_count', 'rating_count'));
    }
    public function activeUsers(Request $request)
    {
        $since = $request->query('since');
        $start = Carbon::createFromTimestamp($since);
        $end = Carbon::now();

        $activeUsersData = DB::table('users')
            ->selectRaw('DATE(last_seen) AS date, COUNT(*) AS active_users')
            ->where('last_seen', '>=', $start)
            ->where('last_seen', '<=', $end)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($activeUsersData);
    }
}
