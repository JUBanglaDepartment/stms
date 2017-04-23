<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Semester;
use App\Models\SemesterCourseFaculty;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = view('semester/create');
        return view('layouts/main_template')->with(['content'=>$content]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'semester' => 'required|max:250',
            'from' => 'required|date',
            'to' => 'required|date'
        ]);

        $semesterTitle = Input::get('semester');
        $fromDate = Input::get('from');
        $toDate = Input::get('to');
        $desc = Input::get('desc');

        $from = Carbon::parse($fromDate);
        $to = Carbon::parse($toDate);

        $semesterTitleDurationInMonths = $to->diffInMonths($from);
        $semesterTitle = ucfirst(strtolower($semesterTitle));
        $semesterYear = $from->year;


        $semester = new Semester;
        $semester->semester_code = $semesterTitle." - ".$semesterYear;
        $semester->semester_title = $semesterTitle." - ".$semesterYear;
        $semester->semester_desc = $desc;
        $semester->year = $semesterYear;
        $semester->duration_months = $semesterTitleDurationInMonths;
        $semester->start_month = $fromDate;
        $semester->end_month = $toDate;
        $semester->is_active = 0;
        $semester->save();


        $request->session()->flash('alert-success', 'Course was created Successfully!');
        return Redirect::to('semester/create');
    }

    public function offerCourses()
    {
        $courses = Course::all();
        $semester = Semester::find($this->offeredSemester());

        $content = view('semester/course')->with(['courses'=>$courses,'semester'=>$semester]);
        return view('layouts/main_template')->with(['content'=>$content]);

    }

    public function assignOfferedCourses(Request $request)
    {
        $offeredSemester = $this->offeredSemester();

        if(isset($_POST['all']))
        {
            $courses = Course::all();
            foreach($courses as $course)
            {
                $data = SemesterCourseFaculty::where('semester_id', '=', $offeredSemester)
                                        ->where('course_id', '=', $course->id)
                                        ->first(['id']);
                if(empty($data))
                {
                    $semisterCourse = new SemesterCourseFaculty;
                    $semisterCourse->semester_id = $offeredSemester;
                    $semisterCourse->course_id = $course->id;
                    $semisterCourse->save();

                    $request->session()->flash('alert-success', 'Courses was assigned Successfully!');
                }
            }
        }
        elseif(isset($_POST['offered']))
        {
            foreach($_POST['offered'] as $course)
            {
                $data = SemesterCourseFaculty::where('semester_id', '=', $offeredSemester)
                    ->where('course_id', '=', $course)
                    ->first(['id']);

                if(empty($data))
                {
                    $semisterCourse = new SemesterCourseFaculty;
                    $semisterCourse->semester_id = $offeredSemester;
                    $semisterCourse->course_id = $course;
                    $semisterCourse->save();

                    $request->session()->flash('alert-success', 'Courses was assigned Successfully!');
                }
            }
        }
        else
        {
            $request->session()->flash('alert-danger', 'No courses was selected');
        }

        return redirect('course-offer');
    }

    private function currentSemester()
    {
        $semester = Semester::where('start_month','<=',Carbon::now())
                            ->where('is_active',1)->first();

        if(isset($semester->id))
        {
            return $semester->id;
        }
        return null;
    }

    private function offeredSemester()
    {
        $semester = Semester::where('start_month','>=',Carbon::now())
                            ->where('is_active',0)->first();

        if(isset($semester->id))
        {
            return $semester->id;
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
