<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponseTrait;
class LoginRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'   => 'required|email|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^|max:254',
            'password' => 'required|min:6|max:20'
        ];
    }

    /*
   * To show validation error that apply to the request.
   *
   **/
   public function failedValidation(Validator $validator){
        $errors = (new ValidationException($validator))->errors();
        $this->setErrors($errors);
        $this->setMessage('Some error occur');
        throw new HttpResponseException($this->toResponse());
    }
}
