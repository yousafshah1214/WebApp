<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserSignedUp;
use App\Http\Requests\SignupRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Laravel\Socialite\Facades\Socialite;

class SignupController extends Controller
{

    private $userRepo;

    /**
     * @param UserRepositoryInterface $userRepo
     */
    function __construct(UserRepositoryInterface $userRepo){
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signup');
    }

    /**
     * Process User Signup form and insert User info in database
     *
     * @param SignupRequest $request
     */
    public function doSignup(SignupRequest $request){;


        $this->userRepo->create($request->all());

        $id = $this->userRepo->getInsertedUserId();

        $userObj = $this->userRepo->getUser($id);

        Event::fire(new UserSignedUp($userObj));
    }

    public function facebookSignup(){
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
