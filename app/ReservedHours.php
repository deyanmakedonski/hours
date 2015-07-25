<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservedHours extends Model
{
    protected $table = 'reservedhours';
    protected $fillable = ['user_id','service_id','client','start','end'];

    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }

    public function service(){
        return $this->belongsTo('\App\Service','service_id');
    }
}
