<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = config('setting.paginate');
        $filters = request()->only('key');

        if($filters){
            $users = User::where('full_name', 'like', '%'.$filters['key'].'%')
                ->orderBy('id','DESC')->paginate($paginate);
        }
        else{
            $users = User::orderBy('id', 'DESC')->paginate($paginate);
        }

        return view('admin.users.index', ['users' => $users]);
    }

    public function lock($id)
    {
        try {
            $user['status'] = User::LOCK;
            if (User::where('id', '=', $id)->update($user)) {
                return redirect()->back()->with(['lock-success' => trans('admin.lock-success')]);
            }

        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());

        }
    }

    public function active($id)
    {
        try {
            $user['status'] = User::ACTIVE;
            if (User::where('id', '=', $id)->update($user)) {
                return redirect()->back()->with(['active-success' => trans('admin.active-success')]);
            }

        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);

            return redirect()->back()->with(['destroy-success' => trans('admin.destroy-success')]);
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());

        }
    }
}
