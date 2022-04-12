<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentsMark;
use App\Models\Students;
use App\Services\StudentMarkService;

class StudentMarkController extends Controller
{
    /**
     * StudentMarkService object.
     *
     * @var StudentMarkService
     */
    public $studentMarkService;

    /**
     * Create a new instance.
     *
     * @param  StudentMarkService  $studentMarkService
     * @return void
     */
    public function __construct(StudentMarkService $studentMarkService)
    {
        $this->studentMarkService = $studentMarkService;
    }

    /**
     * Display the students mark list view.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function studentsMarkList(Request $request)
    {
        $studentsMark = StudentsMark::with('student')->has('student')->latest()->get();

        if ($studentsMark) {
            return view('StudentManagementSystem.studentsMarkList')->with('studentsMarkList', $studentsMark);
        }
    }

    /**
     * Display the student mark edit view.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $studentMarkId
     * @return \Illuminate\View\View
     */
    public function studentMarkEdit(Request $request, $studentMarkId)
    {
        $studentMark = StudentsMark::with('student')->has('student')->findOrFail($studentMarkId);

        $students = Students::select('id', 'name')->get();

        if ($studentMark) {
            return view('StudentManagementSystem.studentMarkEdit')->with(['studentMarkEdit' => $studentMark, 'students' => $students]);
        }
    }

    /**
     * Display the student create view.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function studentMarkCreate(Request $request)
    {
        $students = Students::select('id', 'name')->get();

        return view('StudentManagementSystem.studentMarkCreate')->with(['students' => $students]);
    }

    /**
     * Handle an incoming create request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentMarkStore(Request $request)
    {
        // check student mark is valid
        $validator = $this->studentMarkService->validateStudentMark($request);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        if (Students::where('id', $request->student)->doesntExist()) {
            return back()->with('failed', "Student `{$request->student}` not found for create.");
        }

        $studentMarkData = $request->all();
        $studentMarkData['student_id'] = $request->student;
        $studentMarkData['total_marks'] = $studentMarkData['maths'] + $studentMarkData['science'] + $studentMarkData['history'];

        $studentMarkCreateResponse = StudentsMark::create($studentMarkData);

        if ($studentMarkCreateResponse) {
            return to_route('studentsMarkListTemplate')->with('success', "Student Mark Successfully Created");
        }
    }

    /**
     * Handle an incoming update request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $studentMarkId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentMarkUpdate(Request $request, $studentMarkId)
    {
        $studentMark = StudentsMark::findOrFail($studentMarkId);

        // check student mark is valid
        $validator = $this->studentMarkService->validateStudentMark($request);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        if (Students::where('id', $request->student)->doesntExist()) {
            return back()->with('failed', "Student `{$request->student}` not found for update.");
        }

        $studentMarkData = $request->all();
        $studentMarkData['student_id'] = $request->student;
        $studentMarkData['total_marks'] = $studentMarkData['maths'] + $studentMarkData['science'] + $studentMarkData['history'];

        if ($studentMark) {
            $studentMarkUpdateResponse = tap($studentMark)->update($studentMarkData);

            if ($studentMarkUpdateResponse) {
                return to_route('studentsMarkListTemplate')->with('success', "Student Mark Successfully Updated");
            }
        }
    }

    /**
     * Handle an incoming delete request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $studentMarkId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentMarkDelete(Request $request, $studentMarkId)
    {
        $studentMark = StudentsMark::findOrFail($studentMarkId);

        if ($studentMark) {
            $studentMarkDeleteResponse = tap($studentMark)->delete();

            if ($studentMarkDeleteResponse) {
                return to_route('studentsMarkListTemplate')->with('success', "Student Mark Successfully Deleted");
            }
        }
    }
}
