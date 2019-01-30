<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cedula;

class UserRequest extends FormRequest
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
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', $this->method()=='POST'?'unique:users':''],
      'cedula' => ['required', 'string', 'max:10', new Cedula()],
      'telefono' => ['required', 'string', 'max:10'],
      'ciudad' => ['required', 'string', 'max:255'],
      'password' => [$this->method()=='POST'?'required':'', 'string', 'min:6', $this->method()=='POST'?'confirmed':''],
    ];
  }
}
