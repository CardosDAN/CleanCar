<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    public function accepted(Request $request){
        $id = $request->id;
        DB::statement("UPDATE offers SET accepted = 1 where id =".$id);
        return back()->with('status', 'Accepted successfully');
    }

    public function deleted(Request $request){
        $id = $request->id;
        DB::statement("UPDATE offers SET deleted = 1 where id =".$id);
        return back()->with('status', 'Rejected with success');
    }
}


