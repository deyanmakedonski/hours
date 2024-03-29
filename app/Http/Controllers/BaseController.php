<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    public function __construct(){
        $this->middleware('acl');
    }

}
