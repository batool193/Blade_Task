<?php

namespace App\Http\Requests\task;

use App\Enums\TaskStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:255',
            'status' => 'sometimes|in:Pending,Completed',
        ];
    }


    /**
     * Get the custom messages for validator errors
     *
     * @return array
     */
    public function messages()
    {
        return [

            'string'=>'the :attribute must be string',
            'status.in' => 'The :attribute must be either Pending or Completed.',

        ];
    }
    /**
     * Get custom attributes for validator errors
     *
     * @return array
     */

    public function attributes()
    {
        return [
            'title' => 'task title',
            'description' => 'task description',
            'status' => 'task status',
        ];
    }
    /**
     * Handle a failed validation attempt
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @throws \Illuminate\Validation\ValidationException
     */

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, response()->json([
            'message' => 'validation error',
            'errors' => $validator->errors()
        ], 400));
    }
}
