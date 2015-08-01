<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalendarController extends BaseController
{
    public function getUsers(){
        $users = \DB::select("SELECT users.id,users.name,users.eventcolor as color FROM `users`,`user_category` WHERE user_category.category_id = '".\Request::input('category_id')."' AND users.id=user_category.user_id");
        return \Response::json($users,200);
    }

    public function postReservedhours(){

        $hours = array();
        $reservedHours = \DB::select('SELECT reservedhours.id as hour_id, users.name AS user_name,services.name as service_name,categories.name as category_name,reservedhours.client,reservedhours.start,reservedhours.end,users.eventcolor as color FROM `categories`, `reservedhours`,`services`,`users` WHERE reservedhours.user_id = users.id AND reservedhours.service_id = services.id AND categories.id = services.category_id');
        foreach($reservedHours as $reservedHour){
            $obj = (object)array_fill_keys(array('hour_id','backgroundColor','title','description','start','end'),'');
            $obj->hour_id = $reservedHour->hour_id;
            $obj->backgroundColor = $reservedHour->color;
            $obj->title = $reservedHour->category_name;
            $obj->description = $reservedHour->user_name.'<br>'.'('.$reservedHour->category_name.')-'.$reservedHour->service_name.'<br>'.$reservedHour->client;
            $obj->start = $reservedHour->start;
            $obj->end = $reservedHour->end;
            array_push($hours, $obj);
        }

        $reservedHours = $hours;
        return $reservedHours;
    }

    public function postHtml(){
        return \Response::json(\View::make('partials.admincalendar')->render(),200);
    }

    public function postHourreservation(){

        \App\ReservedHours::create(array('service_id' => \Request::input('service_id'),'user_id'=>\Request::input('user_id'),'client'=>\Request::input('client_name'),'start'=>\Request::input('start'),'end'=>\Request::input('end')));
        $hour_id = \App\ReservedHours::select('id')->get()->last();
        return $hour_id;
    }

    public function postDelevent(){

        \DB::table('reservedhours')->where('id',\Request::input('hour_id'))->delete();
        return 'true';
    }


}
