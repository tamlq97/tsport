<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function notifications()
    {
        $notifications = auth('api')->user()->notifications;
        $unread = auth('api')->user()->unreadNotifications;
        $data['notifications'] = $notifications;
        $data['unreadNotifications'] = $unread;
        return response()->json($data);
    }
    public function unread($notifyID,$userID)
    {
        $user = User::find($userID);
        $user->unreadNotifications->where('id',$notifyID)->markAsRead();
        return $this->notifications();
    }
    public function delete(User $user,$id)
    {
        DB::select("Delete from notifications where notifications.id = '".$id."'");
        return response()->json(['message'=>"Successful delete notify"]);
    }
}
