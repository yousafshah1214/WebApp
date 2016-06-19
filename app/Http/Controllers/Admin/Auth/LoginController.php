<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $guard = 'admin';

    protected $loginPath = 'admin/login';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auth.login');
    }

    public function doAdminLogin(AdminLoginRequest $request){

        $credentials = array(
            'username'  =>  $request->get('username'),
            'password'  =>  $request->get('password')
        );

        if(Auth::guard($this->guard)->attempt($credentials)){
            return redirect()->intended('admin');
        }
        else{
            return redirect()->back()->with('failureMessage',"Username or password is invalid")->withInput();
        }
    }

    public function logout(){
        if(Auth::guard($this->guard)->check()){
            Auth::guard($this->guard)->logout();
        }

        return redirect('admin/login')->with('successMessage',"Successfully Logout from Admin Panel");
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
