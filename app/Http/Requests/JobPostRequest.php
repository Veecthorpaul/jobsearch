<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
        return [
            'title'=>'required',
            'description'=>'required',
            'type'=>'required',
            'location'=>'required',
            'lastdate'=>'required',
            'experience'=>'required',
            'salary'=>'required',
            'status'=>'required',
            'industry'=>'required',
            'applicants'=>'required',
            'level'=>'required',
            'gender'=>'required',
            'requirements'=>'required',

            
        ];
    }
}
