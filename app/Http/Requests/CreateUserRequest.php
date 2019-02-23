<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255' , 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'roles'=>['required','array','min:1'],
            'groups'=>['required','array','min:1'],
            'roles.*'=>['numeric'],
            'groups.*'=>['numeric'],
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'اسم المستخدم مطلوب',
        'name.string' => 'ادخل اسم المستخدم بشكل صحيح',
        'name.max' => '  اسم المستخدم طويل جداً',
        'name.min' => 'يجب ان لا يقل اسم المستخدم عن ٣ حروف',
        'email.required' => 'الايميل مطلوب',
        'email.email' => 'ادخل الايميل بشكل صحيح ',
        'email.unique' => 'الايميل مسجل مسبقاً ',
        'password.confirmed' => 'كلمة االمرور غير متطابقة ',
        'roles.required' => 'يجب اختيار صلاحيه واحده على الاقل ',
        'groups.required' => 'يجب اختيار مجموعة واحده على الاقل ',
      ];
    }
}
