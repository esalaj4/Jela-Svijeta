<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'tag'=>'integer',
                'category'=>'nullable|integer',
                'lang'=>'required',
                'per_page'=>'nullable|integer',
                'page'=>'integer|min:1',
                'diff_time'=>'date'
        ];
    }
}
