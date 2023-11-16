<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function apiLogin(LoginRequest $request)
    {
        $login = $this->authService->apiLogin($request->all());
        if($login['status'] == true) {
            $user = [
                'name' =>$login['user']['name'],
                'email' =>$login['user']['email'],
            ];
                 $this->setMessage($login['message']);
                 $this->setResponseData(['user'=>$user, 'apiToken'=>$login['api-token']]);
                 return $this->toResponse();
  
          }else{
  
                 $this->setMessage($login['message']);
                 $this->setErrors([$login['message']]);
                 $this->setStatus($login['type']);
                 return $this->toResponse();
  
          }
    }
}
