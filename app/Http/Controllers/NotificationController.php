<?php
/**
 * Created by PhpStorm.
 * User: subedi
 * Date: 10/9/18
 * Time: 12:12 PM
 */

namespace App\Http\Controllers;


use App\Events\StatusSend;
use App\Models\Visitors;
use Illuminate\Support\Facades\Event;

class NotificationController extends Controller
{

    public function sendNotification($visitor_id)
    {

        $visitor = Visitors::find($visitor_id);


        //storre notification in database
        /*
         * Notification::create([
         *  'visitor_id'=>$visitor->id,
         *  'seen_status'=>0
         * ])->save()
         *
         *
         */

        broadcast(new StatusSend($visitor))->toOthers();
        return response()->json(['message' => "success"], 200);
    }


}