<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Teachers;
use App\Services\StudentService;

class StudentController extends Controller
{
    /**
     * StudentService object.
     *
     * @var StudentService
     */
    public $studentService;

    /**
     * Create a new instance.
     *
     * @param  StudentService  $studentService
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display the student list view.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function studentsList(Request $request)
    {
        $students = Students::with('teacher')->has('teacher')->latest()->get();

        if ($students) {
            return view('StudentManagementSystem.studentsList')->with('studentsList', $students);
        }
    }

    /**
     * Display the student edit view.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $studentId
     * @return \Illuminate\View\View
     */
    public function studentEdit(Request $request, $studentId)
    {
        $Student = Students::with('teacher')->has('teacher')->findOrFail($studentId);

        $teachers = Teachers::select('id', 'name')->get();

        if ($Student) {
            return view('StudentManagementSystem.studentEdit')->with(['studentEdit' => $Student, 'teachers' => $teachers]);
        }
    }

    /**
     * Display the student create view.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function studentCreate(Request $request)
    {
        $teachers = Teachers::select('id', 'name')->get();

        return view('StudentManagementSystem.studentCreate')->with(['teachers' => $teachers]);
    }

    /**
     * Handle an incoming create request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentStore(Request $request)
    {
        // check student is valid
        $validator = $this->studentService->validateStudent($request);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        if (Teachers::where('id', $request->reportingTeacher)->doesntExist()) {
            return back()->with('failed', "Reporting Teacher `{$request->reportingTeacher}` not found for create.");
        }

        $studentData = $request->all();
        $studentData['teacher_id'] = $request->reportingTeacher;

        $studentCreateResponse = Students::create($studentData);

        if ($studentCreateResponse) {
            return to_route('studentsListTemplate')->with('success', "{$request->name} Successfully Created");
        }
    }

    /**
     * Handle an incoming update request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $studentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentUpdate(Request $request, $studentId)
    {
        $student = Students::findOrFail($studentId);

        // check student is valid
        $validator = $this->studentService->validateStudent($request);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        if (Teachers::where('id', $request->reportingTeacher)->doesntExist()) {
            return back()->with('failed', "Reporting Teacher `{$request->reportingTeacher}` not found for update.");
        }

        $studentData = $request->all();
        $studentData['teacher_id'] = $request->reportingTeacher;

        if ($student) {
            $studentUpdateResponse = tap($student)->update($studentData);

            if ($studentUpdateResponse) {
                return to_route('studentsListTemplate')->with('success', "{$request->name} Successfully Updated");
            }
        }
    }

    /**
     * Handle an incoming delete request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $studentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentDelete(Request $request, $studentId)
    {
        $student = Students::findOrFail($studentId);

        if ($student) {
            $studentDeleteResponse = tap($student)->delete();

            if ($studentDeleteResponse) {
                return to_route('studentsListTemplate')->with('success', "{$studentDeleteResponse->name} Successfully Deleted");
            }
        }
    }
}
