<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function registerView(){
        return view('auth.register');
    }

    public  function register(Request $request){

        if(User::CheckDuplicateEmail($request->email) || User::checkDuplicateUsername($request->username)){
            return back()->with('error','Username/Email already registered');
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            return back()->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }


    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // // $user = User::where('email', $request->email)->first();
        // if($user){
                // $_SESSION['isLoggedIn'] = true;
        //     return redirect('/dashboard');
        // }

        return back()->with('error','Email/Password mismatch');
    }

    public function logout(){
        // Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
