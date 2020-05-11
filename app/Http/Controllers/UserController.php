<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }

    public function profile()
    {
    	$user = $this->userRepo->getCurrentUser();

		return view('user.profile')->withUser($user);
    }

    public function edit()
    {
    	$user = $this->userRepo->getCurrentUser();

		return view('user.edit')->withUser($user);
    }

    public function update(UserUpdateRequest $request)
    {
        try {
            $user = [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'birthdate' => $request->birthdate,
                'address' => $request->address,
                'phone' => $request->phone,
            ];

            if ($this->userRepo->update(auth()->user()->id, $user)) {
                return redirect()->back()->with('success', trans('auth.update-success'));
            }
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function passwordEdit()
    {
    	return view('user.password');
    }

    public function passwordUpdate(ChangePasswordRequest $request)
    {
        try {
            $user = $this->userRepo->findOrFail(Auth::user()->id);

            if (Hash::check($request['currentPassword'], $user->password)) {
                $user['password'] = Hash::make($request['password']);
                $user->save();

                return redirect()->back()->with('success', trans('auth.change-password-success'));
            } else {
                return redirect()->back()->with('error', trans('auth.change-password-error'));
            }
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
