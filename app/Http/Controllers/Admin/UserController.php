<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

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
            $users = $this->userRepo->getUserBySearchName($filters['key'],$paginate);
        }
        else{
            $users = $this->userRepo->paginate('id', 'DESC', $paginate);
        }

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function lock($id)
    {
        try {
            $user['status'] = User::LOCK;

            if ($this->userRepo->update($id, $user)) {
                return redirect()->back()
                    ->with(['lock-success' => trans('admin.lock-success')]);

            }
            
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());

        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function active($id)
    {
        try {
            $user['status'] = User::ACTIVE;

            if ($this->userRepo->update($id, $user)) {
                return redirect()->back()
                    ->with(['active-success' => trans('admin.active-success')]);
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
            $this->userRepo->delete($id);

            return redirect()->back()
                ->with(['destroy-success' => trans('admin.destroy-success')]);
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());

        }
    }
}
