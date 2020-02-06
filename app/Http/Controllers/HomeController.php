<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Routine;
use App\Class_time;
use App\Subject;

use Calendar;
class HomeController extends Controller
{

    public function index()
    {
        if (Auth::user()->user_role == 0) { // admin will redirect to admin dashboard
            return view('layouts.admin');
        }elseif (Auth::user()->user_role == 2 ) { //student will redirect to student dashboard
            $calendar_details = Routine::all();
            return view('home')->with('calendar_details',$calendar_details);
        }
    }

    public function viewProfile()
    {
        return view('users.profile'); //display the admin profile page
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request['name'];
        if($request['profile_image'] != ""){
            $imageName = time().'.'.$request['profile_image']->getClientOriginalExtension();
            $request['profile_image']->move(public_path('images'), $imageName);
            $user->profile_image = $imageName;
        }
        $user->save();

        return redirect()->back()->withSuccessMessage('User Details updated successfully.');
    }

    public function updatePass(Request $request)
    {
        $this->validate($request,[
            'c_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $current_password = Auth::user()->password;
        if (Hash::check($request['c_password'],$current_password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect()->back()->withSuccessMessage('Password Changed Successfully.');
        }else {
            return redirect()->back()->withErrorMessage('Current Password Not matched.');
        }
    }


    public function viewStudentProfile()
    {
        return view('users.studentProfile'); //display the student profile page
    }

}
