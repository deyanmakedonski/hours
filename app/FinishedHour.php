<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedHour extends Model
{
    public $timestamps = false;

    protected $table = 'finishedhours';

    protected $fillable = ['user_id','service_id','client','price','created_at'];

    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }
    public function service(){
        return $this->belongsTo('\App\Service','service_id');
    }
}
