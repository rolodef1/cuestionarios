<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpcionRequest extends FormRequest
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
      'opcion' => ['required', 'string', 'max:255'],
      'resp_correcta' => ['required', 'boolean'],
    ];
  }
}