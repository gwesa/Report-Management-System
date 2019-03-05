<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
          'name'=>'required|string|min:3|max:225|unique:reports,name,' . $this->get('id'),
          'files' => 'required|array',
          'files.*' => 'required|mimes:jpeg,png,jpg,gif,svg,audio/mpeg,wav',
          'description' => 'required|string|min:4',
          'group_id' => 'required|numeric',
          'tags' => 'required|string|regex:/^[a-z]+(,[a-z]+)*$/',
        ];
    }

    public function messages()
    {
        return [
          'tags.regex' => 'يجب إدخال اسم التصنيف بشكل صحيح(اعمال،رياضة)',
        ];
    }
}
