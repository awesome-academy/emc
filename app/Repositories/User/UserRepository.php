<?php 

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	public function getModel()
	{
		return User::class;
	}

	public function getCurrentUser()
	{
		return Auth::user();
	}

	public function getUserBySearchName($filters = [], $paginate)
	{
        return User::where('full_name', 'like', '%'.$filters.'%')
    		->orderBy('id','DESC')->paginate($paginate);
	}
}