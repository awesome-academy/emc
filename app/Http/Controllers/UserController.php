<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($id)
    {
    	$user = User::find($id);

    	if ($user) {
    		return view('user.profile')->withUser($user);
    	} else {
    		return redirect()->back();
    	}
    }

    public function edit()
    {
    	if (Auth::user()) {
    		$user = User::find(Auth::user()->id);

    		if ($user) {
    			return view('user.edit')->withUser($user);
    		} else {
    			return redirect()->back();		
    		}
    	} else {
    		return redirect()->back();
    	}
    }

    public function update(Request $request)
    {
    	$user = User::find(Auth::user()->id);

    	if ($user) {
    		$user->full_name = $request['full_name'];
    		$user->email = $request['email'];
    		$user->birthdate = $request['birthdate'];
    		$user->address = $request['address'];
    		$user->phone = $request['phone'];

    		$user->save();
    		$request->session()->flash('success', 'Your details is have now been updated!!');
			return redirect()->back();
    	} else {
    		return redirect()->back();
    	}
    }

    public function passwordEdit()
    {
    	if (Auth::user()) {
    		return view('user.password');
    	} else {
    		return redirect()->back();
    	}
    }

    public function passwordUpdate(Request $request)
    {
    	$user = User::find(Auth::user()->id);

    	if ($user) {
    		if (Hash::check($request['currentPassword'], $user->password)) {
    			$user->password = Hash::make($request['password']);
    			$user->save();

    			$request->session()->flash('success', 'Your password have been updated!!');
				return redirect()->back();
    		} else {
    			$request->session()->flash('error', 'The entered does not match your current password!!');
				return redirect()->route('user.passwordEdit');
    		}
    	}
    	return redirect()->back();
    }
}
