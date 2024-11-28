<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'account' => ['required', 'between:4,20', 'regex:/^[0-9a-zA-Z]+$/']
            ,'password' => ['required', 'between:4,20', 'regex:/^[0-9a-zA-Z!@]+$/']
        ];

        if($this->routeIs('auth.login')) {
            // login
            $rules['account'][] = 'exists:users,account';
        } else if($this->routeIs('user.store')) {
            // registration - 아이디 중복 체크 할 때 따로 버튼을 만드는 것과 지금 이 방식 중 뭐가 효율적인가? 유저 경험은 버튼을 만드는 것이 낫다고 보는데 실시간 처리(체크)하는 것도 있다.
            // 실시간으로 할 때 고려해야할 점이 많다. (딜레이 1초 이상 이면 확인하도록?) - 버튼을 안 눌러도 된다는 장점이 있지만 딜레이 시간에 따라 부정적 경험을 받을 수 있어서 버튼으로 만드는 것이 쉽고 확실하다.
            $rules['account'][] = 'unique:users,account';
            $rules['password_chk'] = ['same:password'];
            $rules['name'] = ['required', 'between:1,20', 'regex:/^[가-힣]+$/u'];
            $rules['gender'] = ['required', 'regex:/^[0-1]{1}$/'];
            $rules['profile'] = ['required', 'image'];
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator) {
        $response = response()->json([
            'success' => false,
            'message' => '유효성 체크 오류',
            'data' => $validator->errors()
        ], 422);

        throw new HttpResponseException($response);
    }

}
