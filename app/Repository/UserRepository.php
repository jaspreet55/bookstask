<?php 
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\app\Models\AdminUser;
use App\Models\User;
use App\Services\AuthService;
use Auth;
use Validator;
use Input;
use Hash;
use JWTAuth;
use JWTAuthException;

class UserRepository extends AuthService
{
	public $user;
    protected $apiUser;

	function __construct(AdminUser $user,User $apiUser) {
      $this->user = $user;
      $this->apiUser = $apiUser;
    }
     /**
     * To login a new user 
     * @param  array $data 
     * @return  array 
     */
    public function adminLogin($data)
    {
       
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
       
        if(Auth::guard('admin')->attempt($credentials)){
            Auth::login(Auth::guard('admin')->user());
            return true;
        }else{
            return false;
        }
    }


    public function apiLogin($data)
    {
        $email      = $data['email'];
        $password   = $data['password'];
        $credential =  [
            'email'  => $email,
            'password'=> $password
        ];
        $user = User::where('email', $email)->first();
        $token = JWTAuth::attempt($credential);
       
        if (!$token) {
            return ['status'=>false,'message'=> 'Invalid email or password','type'=>400];
        }
        // $user = Auth::user();
        return ['status' => true, 'message' => 'Login Successfully!!', 'user' => $user, 'api-token' => $token,'type'=>200];
    }
}