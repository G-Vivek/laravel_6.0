<?php

namespace App\Repositories;

use App\Repositories\UsersRepositoryInterface;
use App\User;

class UsersRepository  implements  UsersRepositoryInterface{

	public function all(){

		return $users = User::get()->map->format() ;
	}

	public function getUser($id){

		return $users = User::where('id',$id)->get()->map->format() ;
	}
	
}