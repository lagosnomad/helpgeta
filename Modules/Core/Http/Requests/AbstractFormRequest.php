<?php

namespace Modules\Core\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest {

    /**
     * Authorize
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }
}