<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getHome(){


        $hours = array();
        $services = \App\Service::all();
        $reservedHours = \DB::select('SELECT reservedhours.id as hour_id, users.name AS user_name,services.name as service_name,categories.name as category_name,reservedhours.client,reservedhours.start,reservedhours.end FROM `categories`, `reservedhours`,`services`,`users` WHERE reservedhours.user_id = users.id AND reservedhours.service_id = services.id AND categories.id = services.category_id');

        foreach($services as $service){
            $service->name = '('.$service->category->name.')-'.$service->name;
        }

        foreach($reservedHours as $reservedHour){
            $obj = (object)array_fill_keys(array('hour_id','title','description','start','end'),'');
            $obj->hour_id = $reservedHour->hour_id;
            $obj->title = $reservedHour->category_name;
            $obj->description = $reservedHour->user_name.'<br>'.'('.$reservedHour->category_name.')-'.$reservedHour->service_name.'<br>'.$reservedHour->client;
            $obj->start = $reservedHour->start;
            $obj->end = $reservedHour->end;
            array_push($hours, $obj);
        }

        $reservedHours = $hours;
        return view('pages.home',compact('services','reservedHours'));
    }
}
