<?php

namespace Modules\Admin\app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Modules\Admin\app\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    /*
	    |--------------------------------------------------------------------------
	    | Login Controller
	    |--------------------------------------------------------------------------
	    |
	    | This controller handles authenticating users for the application and
	    | redirecting them to your home screen. The controller uses a trait
	    | to conveniently provide its functionality to your applications.
	    |
    */

	/**
		* Where to redirect users after login.
		*
		* @var string
	*/
   	protected $service = '';
   	protected $redirectTo = '/';

	/**
		* Create a new controller instance.
		*
		* @return void
	*/
    public function __construct(AuthService $service)
    {
        // $this->middleware('AuthAdminCheck')->except('logout');
        $this->service = $service;
    }
	/**
		* Create a user login function
		*
		* @param  array $request
		* @return json response 
	*/
    public function Login()
    {
    	return view('admin::auth.login');
    }
    public function adminLogin(Request $request)
    {
		$request->validate([
            'email'   => 'required|email|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^|max:254',
            'password' => 'required|min:6|max:20'
        ]);
    	
		$user = $this->service->adminLogin($request->all());
		if( $user == true ){
			return redirect()->route('admin.dashboard');
		}else{
            return back()->withErrors(['error'=>'Wrong Admin Credentials.']);
		}
    }
    /**
		* Create a admin logout function
		*
		* @param  array $request
		* @return json response 
	*/
     public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
