<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function created_user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
    public function updated_user()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }
}
