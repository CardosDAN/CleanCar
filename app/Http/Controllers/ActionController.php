<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    public function accepted(Request $request){
        $offer = Offer::find($request->id);
        $id = $request->id;
        DB::statement("UPDATE offers SET accepted = 1 where id =".$id);
            $this->new_notification($offer->user_id, 'Your offer has been accepted', 'offer/'.$offer->id.'/edit');
        return back();
    }

    public function deleted(Request $request){
        $offer = Offer::find($request->id);
        $id = $request->id;
        DB::statement("UPDATE offers SET deleted = 1 where id =".$id);
        $this->new_notification($offer->user_id, 'Your offer has been deleted', 'offer/'.$offer->id.'/edit');
        return back()->with('status', 'Rejected with success');
    }

    public function new_notification($user_id, $message, $link){
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->message = $message;
        $notification->link = url($link);
        $notification->save();
    }

    public function get_latest_notifications(){
        $user_id = auth()->user()->id;
        $notifications = Notification::where('user_id', $user_id)
            ->where('is_read', 0)
            ->get();
        return response()->json($notifications);
    }
    public function get_notifications_count() {
        $user_id = auth()->user()->id;
        $notifications_count = Notification::where('user_id', $user_id)
            ->where('is_read', 0)
            ->count();
        return response()->json($notifications_count);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->is_read = 1;
        $notification->save();
        return back();
    }
    public function mark_all_as_read(){
        $user_id = auth()->user()->id;
        $notifications = Notification::where('user_id', $user_id)
            ->where('is_read', 0)
            ->get();
        foreach ($notifications as $notification){
            $notification->is_read = 1;
            $notification->save();
        }
        return back();
    }
}


