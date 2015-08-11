<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

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
            \Image::make($file->getRealPath())->fit(1000, 1000)->save($path,30);
        });
    }

    public function postColorpick(){

        $user = \App\User::find(\Auth::user()->id);
        $user->eventcolor = \Request::input('eventcolor');
        $user->save();
        return 'true';
    }

    public function getChangePassword(){
        return \Response::json(\View::make('partials.changepassword')->render(),200);
    }

    public function postChangePassword(){

        $validator = $this->validator(\Request::all());
        if ($validator->fails() ) {

            return \Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        \Auth::user()->password = bcrypt(\Request::input('password'));
        \Auth::user()->save();

        return 'true';
    }

    public function validator(array $data)
    {
        \Validator::extend('passcheck', function() {
            $value = \Request::input('old_password');
            return \Hash::check($value, \Auth::user()->password);
        });


        return \Validator::make($data, [
            'password' => 'required|confirmed|min:6',
            'old_password' => 'required|passcheck'

        ], [
            'old_password.required' => 'Паролата е задължителна.',
            'old_password.passcheck' => 'Грешна парола.',
            'password.required' => 'Паролата е задължителна.',
            'password.confirmed' => 'Потвърдената парола е грешна.',
            'password.min' => 'Минимална дължина на паролата 6 символа.',


        ]);
    }

}
