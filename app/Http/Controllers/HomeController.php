<?php

namespace App\Http\Controllers;
use App\Repositories\UsersRepositoryInterface;
use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $UsersRepository;

    public function __construct(UsersRepositoryInterface $UsersRepository)
    {
        $this->UsersRepository = $UsersRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $users = $this->UsersRepository->all();
        return $users;
    }

    public function getUser($id){

        $users = $this->UsersRepository->getUser($id);
        return $users;
    }
}
