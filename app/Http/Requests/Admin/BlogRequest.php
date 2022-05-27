<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('post')){
            return [
                'name' => 'required|max:120|min:2',
                'tags' => 'max:120|min:2',
                'status' => 'required|numeric|in:0,1',
                'body' => 'required|min:5',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',

            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2',
                'tags' => 'max:120|min:2',
                'status' => 'required|numeric|in:0,1',
                'body' => 'required|min:5',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
            ];
        }
    }
}
