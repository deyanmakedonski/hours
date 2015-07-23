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
        $services = \App\Service::all();
        foreach($services as $service){
            $service->name = '('.$service->category->name.')-'.$service->name;
        }
        return view('pages.home',compact('services'));
    }
}
