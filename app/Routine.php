<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Routine extends Model 
{
    protected $fillable = [
        'subject_id', 'class_time_id','room_no','teacher_id','status','created_by'
    ];

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
    // public function routine_details()
    // {
    //     $details = DB::table('routines')
    //                 ->join('subject_id','subjects.id',)
    // }

    // $driver_details = DB::table('users')
    //                     ->join('role_user','users.id','role_user.user_id')
    //                     ->join('company_user','users.id','company_user.user_id')
    //                     ->where('company_user.company_id',$company_id)
    //                     ->where('role_user.role_id','3')
    //                     ->get();
    // return $driver_details;
}
