<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalendarController extends BaseController
{
    public function getUsers(){
        $users = \DB::select("SELECT users.id,users.name FROM `users`,`user_category` WHERE user_category.category_id = '".\Request::input('category_id')."' AND users.id=user_category.user_id");
        return \Response::json($users,200);
    }

    public function postHourreservation(){

        \App\ReservedHours::create(array('service_id' => \Request::input('service_id'),'user_id'=>\Request::input('user_id'),'client'=>\Request::input('client_name'),'start'=>\Request::input('start'),'end'=>\Request::input('end')));
        $hour_id = \App\ReservedHours::select('id')->get()->last();
        return $hour_id;
    }

}
