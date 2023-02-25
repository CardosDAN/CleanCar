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
        $facebookCount = User::whereNotNull('facebook_id')->count();
        $googleCount = User::whereNotNull('google_id')->count();
        $githubCount = User::whereNotNull('github_id')->count();
        $user_level_count = User::where('level_id', '1')->count();
        $worker_level_count = User::where('level_id', '3')->count();
        $manager_level_count = User::where('level_id', '2')->count();
        $admin_level_count = User::where('level_id', '4')->count();

        $data = Offer::select('end_time')
            ->where('completed', 1)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->end_time)->format('Y-m');
            });

        $chartData = [];
        foreach ($data as $month => $value) {
            $chartData['labels'][] = $month;
            $chartData['data'][] = count($value);
        }


        $users = User::select(DB::raw('count(*) as user_count, YEAR(created_at) year, MONTH(created_at) month'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $chartDataGrowth = [
            'labels' => [],
            'data' => []
        ];

        foreach ($users as $user) {
            $chartDataGrowth['labels'][] = $user->month . '/' . $user->year;
            $chartDataGrowth['data'][] = $user->user_count;
        }


        $users = User::selectRaw('COUNT(*) as count, CASE
                                    WHEN facebook_id IS NOT NULL THEN "Facebook"
                                    WHEN github_id IS NOT NULL THEN "Github"
                                    WHEN google_id IS NOT NULL THEN "Google"
                                    ELSE "Site"
                                END as provider')
            ->groupBy('provider')
            ->get();

        $labels = $users->pluck('provider')->toArray();
        $series = $users->pluck('count')->toArray();


        $users = User::selectRaw('COUNT(*) as count, CASE
                                    WHEN level_id = 1 THEN "User"
                                    WHEN level_id = 2 THEN "Manager"
                                    WHEN level_id = 3 THEN "Worker"
                                    WHEN level_id = 4 THEN "Admin"
                                    ELSE "Guest"
                                END as levels')
            ->groupBy('levels')
            ->get();

        $labels_level = $users->pluck('levels')->toArray();
        $series_level = $users->pluck('count')->toArray();

        return view('index', compact('user_count', 'posts_count', 'offers_count', 'rating_count', 'chartData',
            'chartDataGrowth', 'labels', 'series', 'facebookCount', 'googleCount', 'githubCount', 'user_level_count', 'worker_level_count',
            'manager_level_count', 'admin_level_count' ,'labels_level', 'series_level'
        ));
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
