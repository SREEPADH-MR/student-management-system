<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StudentMarkService
{
    /**
     * check student mark is valid
     *
     * @param $request
     * @return Validator $validator
     */
    public function validateStudentMark($request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'student' => 'required|integer',
                'term' => ['required', Rule::in(['ONE', 'TWO'])],
                'maths' => 'required|integer',
                'science' => 'required|integer',
                'history' => 'required|integer',
            ],
            [
                'term.in' => "The term field must be 'ONE' or 'TWO'.",
                'student.required' => 'The student field is required.',
                'student.integer' => 'The student must be an integer.',
            ],
        );

        return $validator;
    }
}
