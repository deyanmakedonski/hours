<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getHome(){

        $services = \App\Service::all();
        $categories = \Auth::user()->categories;
        $servicesnp = new Collection;

        foreach($services as $service){
            $service->name = '('.$service->category->name.')-'.$service->name;
        }

        foreach($categories as $category){
            foreach($category->services as $service){
                $service->name = '('.$service->category->name.')-'.$service->name;
                $servicesnp->push($service);
            }
        }

        return view('pages.home',compact('services','servicesnp'));
    }

}
