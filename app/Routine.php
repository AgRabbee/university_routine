<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    public function subjects()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }
    public function class_times()
    {
        return $this->belongsTo('App\Class_time','class_time_id','id');
    }
    public function teachers()
    {
        return $this->belongsTo('App\User','teacher_id','id');
    }
    public function created_user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
    public function updated_user()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }
}
