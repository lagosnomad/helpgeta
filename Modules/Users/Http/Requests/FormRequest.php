<?php
namespace Modules\Users\Http\Requests;

use Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest {

    public function rules()
    {
        $rules = [
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ];

        return $rules;
    }
}
