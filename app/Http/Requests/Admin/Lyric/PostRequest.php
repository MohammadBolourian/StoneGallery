<?php

namespace App\Http\Requests\Admin\Lyric;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:lyric_categories,id',
                'status' => 'required|numeric|in:0,1',
                'body' => 'required|min:5',

            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:lyric_categories,id',
                'status' => 'required|numeric|in:0,1',
                'body' => 'required|min:5',
            ];
        }
    }
}
