<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' =>'required |min:3|max:20| unique:groups,name,' . $this->get('id'),
        ];
    }

    public function messages()
    {
      return [
          'required' => '  يرجى إدخل اسم المجموعة  ',
          'min'=>' يجب ان لايقل الاسم عن ٣ حروف ',
          'unique'=>' المجموعة موجودة مسبقاً  ',

      ];
    }
  }
