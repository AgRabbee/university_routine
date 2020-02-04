<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    //preview all users details to the admin
    public function allUsers()
    {
        $users = User::where('id','<>',Auth::user()->id)->get();

        return view('users.allUsers')->with('users', $users);
    }


        public function user_active(Request $request)
        {
            $user_id = $request['user_id'];
            $user = User::find($user_id);
            $user->status = 1;
            $user->save();

            return redirect()->back()->withSuccessMessage('Successfully Activated');
        }

        public function user_pause(Request $request)
        {
            $user_id = $request['user_id'];
            $user = User::find($user_id);
            $user->status = 0;
            $user->save();

            return redirect()->back()->withSuccessMessage('Successfully Paused');
        }

        public function user_deny(Request $request)
        {
            $user_id = $request['user_id'];
            $user = User::find($user_id);
            $user->status = 2;
            $user->save();

            return redirect()->back()->withSuccessMessage('Successfully Denied');
        }

}
