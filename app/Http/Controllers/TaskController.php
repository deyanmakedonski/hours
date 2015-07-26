<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function postIndex(){
        $user_id = \Auth::user()->id;
        $reservedPersonalHours = \DB::select('SELECT reservedhours.id,categories.name,reservedhours.start FROM `reservedhours`,`categories`,`services` where DATE(reservedhours.start) = CURRENT_DATE and reservedhours.service_id = services.id AND services.category_id = categories.id and reservedhours.user_id ='.$user_id);
        $reservedPersonalHours = json_encode($reservedPersonalHours);
        return \Response::json(\View::make('partials.tasks',compact('reservedPersonalHours'))->render(),200);
    }

    public function postFinishedtask(){
        $reservedhour = \App\ReservedHours::find(\Request::input('hour_id'));
        \App\FinishedHour::create(array('user_id'=>$reservedhour->user_id,'service_id'=>$reservedhour->service_id,'client'=>$reservedhour->client,'price'=>$reservedhour->service->price,'created_at'=>date('Y-m-d')));
        \DB::table('reservedhours')->where('id','=',$reservedhour->id)->delete();
        return 'true';
    }
}
