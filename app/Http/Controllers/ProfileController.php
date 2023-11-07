<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function edit(){
        return view('profile_edit');
    }

    public function update(Request $request){
        if($this->checkDuplicateEmail($request->email)){
            return back()->with('error','Email already exists');
        }

        try {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->bio = $request->bio;
            $user->save();
            return back()->with('success','User Updated Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkDuplicateEmail(string $email) : bool {
        $user = User::where('email', $email)->whereNot('id', Auth::id() )->first();

        if($user)
            return true;
        else
            return false;
    }
}
