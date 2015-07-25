<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function getIndex(){
        $user_id = \Auth::user()->id;
        $reservedPersonalHours = \DB::select('SELECT reservedhours.id,categories.name,reservedhours.start FROM `reservedhours`,`categories`,`services` where DATE(reservedhours.start) = CURRENT_DATE and reservedhours.service_id = services.id AND services.category_id = categories.id and reservedhours.user_id ='.$user_id);
        $reservedPersonalHours = json_encode($reservedPersonalHours);
        return \Response::json(\View::make('partials.tasks',compact('reservedPersonalHours'))->render(),200);
    }
}
