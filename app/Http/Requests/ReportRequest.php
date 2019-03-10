<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FileType;
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
          'files' => 'array',
          'files.*' => ['required',new FileType],
          'description' => 'required|string|min:4',
          'group_id' => 'required|numeric',
          'tags' => 'required|string',
        ];
    }
}
