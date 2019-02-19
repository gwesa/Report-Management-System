<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateUserProfile extends FormRequest
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
            'email' =>'required |email |unique:users,email,' . Auth::user()->id,
            'password' => 'string|min:6|max:30|nullable',
        ];
    }

    public function messages()
  {
      return [
          'required' => 'يرجى ادخال الايميل ',
          'email'=>'ادخل الايميل بشكل صحيح ',
          'unique'=>'الايميل موجود مسبقاً'

      ];
  }
}
