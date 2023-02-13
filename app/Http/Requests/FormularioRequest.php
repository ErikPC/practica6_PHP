<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioRequest extends FormRequest
{

    public function authorize()
    {
        // return $this->post ? $this->user()->can('update', $this->post) : true;
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'extract' => 'required',
            'content' => 'required',
            'access' => 'required',
        ];
    }
}
