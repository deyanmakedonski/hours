<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservedHours extends Model
{
    public $timestamps = false;
    protected $table = 'reservedhours';
    protected $fillable = ['user_id','service_id','client','start','end'];


}
