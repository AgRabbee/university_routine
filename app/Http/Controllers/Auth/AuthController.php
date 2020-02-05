<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class AuthController extends Controller
{
    public function signInForm()
    {
        return view('auth.login');
    }

    public function signUpForm()
    {
        return view('auth.register');
    }

    public function signIn(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'mobile' => 'required|regex:/\+?(88)?0?1[456789][0-9]{8}\b/',
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'mobile' => $request['mobile'],'status'=>0])) {
            session()->flash('type','danger');
            session()->flash('message','User registration is not accepted yet. Contact with System admin');
            return redirect()->back();
        }elseif (Auth::attempt(['email' => $request['email'], 'password' => $request['password'],'mobile' => $request['mobile'],'status'=>1])) {
            return redirect('/home');
        }
        session()->flash('type','danger');
        session()->flash('message','Invalid credentials');
        return redirect()->back();
    }

    public function signUp(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_role' => 'required|integer',
            'mobile' => 'required|regex:/\+?(88)?0?1[456789][0-9]{8}\b/',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->user_role = $request['user_role'];
        $user->mobile = $request['mobile'];

        //storing image into public\images folder
        $imageName = time().'.'.$request['profile_image']->getClientOriginalExtension();
        $request['profile_image']->move(public_path('images'), $imageName);

        $user->profile_image = $imageName;
        $user->status = 0;
        $user->save();
        session()->flash('type','success');
        session()->flash('message','Registration Complete Successfully.');
        return redirect('/signin');
    }
}
