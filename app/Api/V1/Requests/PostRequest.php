<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
