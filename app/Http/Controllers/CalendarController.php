<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalendarController extends BaseController
{
    public function getUsers(){

        $users = \DB::select("SELECT users.id,users.name FROM `users`,`user_category` WHERE user_category.category_id = '".\Request::input('category_id')."' AND users.id=user_category.user_id");
        dd($users);
        return $users;
    }
}
