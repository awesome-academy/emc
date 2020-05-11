<?php 

namespace App\Repositories\User;

interface UserRepositoryInterface 
{
	/**
	* @return mixed
	*/
	public function getCurrentUser();
	
	/**
	* @param $key
	* @return mixed
	*/
	public function getUserBySearchName($filters = [], $paginate);
	
}