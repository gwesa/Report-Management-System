<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileType implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      $allowed = array('mpga','ogg','mp3','jpeg','png','jpg','gif','svg');
      $ext = $value->getClientOriginalExtension();
      return in_array($ext, $allowed);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'الملفات المسموح برفعها صوره/ ملف صوتي ';
    }
}
