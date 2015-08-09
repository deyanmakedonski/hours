<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'services';

    protected $fillable = ['category_id','name','price','time'];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

}
