<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class saveNewEmployeeRequest extends FormRequest
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
//            "surname" => "required",
//            "name" => "required",
//            "middle_name" => "required",
//            "sociability" => "required|min:1|max:10",
//            "engineering_skills" => "required|min:1|max:10",
//            "time_management" => "required|min:1|max:10",
//            "knowledge_languages" => "required|min:1|max:10",
        ];
    }
}
