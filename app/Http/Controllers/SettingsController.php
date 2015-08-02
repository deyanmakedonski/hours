<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function getProfile(){
        $users= \App\User::select('id','name')->where('id','!=',\Auth::user()->id)->get();
        $resHours = count(\App\ReservedHours::where('user_id',\Auth::user()->id)->get());
        $finHours = count(\App\FinishedHour::where('user_id',\Auth::user()->id)->get());
        return view('users.index',['users'=>$users,'resHours'=>$resHours,'finHours'=>$finHours]);
    }

    public function postAvatar(){

        return \Plupload::receive('file', function ($file){
            // Store the uploaded file
            $email = \Auth::user()->email;
            $path = storage_path().'/profiles/'.$email.'/avatar/';
            if(!file_exists($path)){
                \File::makeDirectory($path,  $mode = 0777, $recursive = true);
                $path = storage_path().'/profiles/'.$email.'/avatar/avatar.jpg';
                \Image::make($file->getRealPath())->save($path,30);
            }
            $path = storage_path().'/profiles/'.$email.'/avatar/avatar.jpg';
            if(file_exists($path)){
                chown($path,465);
                unlink($path);
            }
            \Image::make($file->getRealPath())->fit(900, 900)->save($path,30);
        });
    }

    public function postColorpick(){

        $user = \App\User::find(\Auth::user()->id);
        $user->eventcolor = \Request::input('eventcolor');
        $user->save();
        return 'true';
    }
}
