<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo){
        $this->userRepo = $userRepo;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepo->fetchAll();
        return view('home',compact('users'));
    }
}
