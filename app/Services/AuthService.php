<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Auth;
use Modules\Admin\app\Models\AdminUser;

class AuthService {
	
    protected  $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Create a login service function.
     *
     * @param  $request
     * @return 
     */
    public function adminLogin($request)
    {
       
        return $this->userRepo->adminLogin($request);
    } 

    public function apiLogin($request)
    {
    	return $this->userRepo->apiLogin($request);
    }
}