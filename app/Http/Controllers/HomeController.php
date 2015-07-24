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
        $reservedHours = \DB::select('SELECT users.name AS user_name,services.name as service_name,reservedhours.client,reservedhours.start,reservedhours.end FROM `reservedhours`,`services`,`users` WHERE reservedhours.user_id = users.id AND reservedhours.service_id = services.id');

        foreach($services as $service){
            $service->name = '('.$service->category->name.')-'.$service->name;
        }

        foreach($reservedHours as $reservedHour){
            $obj =    (object)array('title','description','start','end');
            $obj->title = $reservedHour->service_name;
            $obj->description = $reservedHour->user_name.'\n'.$reservedHour->service_name.'\n'.$reservedHour->client;
            $obj->start = $reservedHour->start;
            $obj->end = $reservedHour->end;
            array_push($hours, $obj);
        }

        $reservedHours = $hours;
        return view('pages.home',compact('services','reservedHours'));
    }
}
