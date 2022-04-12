<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StudentService
{
    /**
     * check student is valid
     *
     * @param $request
     * @return Validator $validator
     */
    public function validateStudent($request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'name' => 'required|min:2',
                'age' => 'required|integer|gt:10|lt:50',
                'gender' => ['required', Rule::in(['M', 'F'])],
                'reportingTeacher' => 'required|integer',
            ],
            [
                'gender.in' => "The gender field must be 'M' or 'F'.",
                'reportingTeacher.required' => 'The reporting teacher field is required.',
                'reportingTeacher.integer' => 'The reporting teacher must be an integer.',
            ],
        );

        return $validator;
    }
}
