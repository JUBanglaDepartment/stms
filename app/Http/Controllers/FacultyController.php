<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\SemesterCourseFaculty;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class FacultyController extends Controller
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
        $content = view('faculty/create');
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
            'username' => 'required|max:250',
            'code' => 'required|max:250'
        ]);


//        DB::transaction(function($request)
//        {
//            $user = new User;
//            $user->username = Input::get('username');
//            $user->password = bcrypt(Input::get('username'));
//            $user->role_id = 2;
//            $user->is_aactive = 1;
//            $user->save();
//
//            $faculty = new Faculty;
//            $faculty->user_id = $user->id;
//            $faculty->teacher_code = Input::get('code');
//            $faculty->is_active = 1;
//            $faculty->save();
//
//            if( !$faculty )
//            {
////                throw new \Exception('User not created for account');
//                $request->session()->flash('alert-success', 'Course creation failed!');
//                return Redirect::to('faculty/create');
//            }
//
//            $request->session()->flash('alert-success', 'Course was created Successfully!');
//            return Redirect::to('faculty/create');
//        });

        $user = new User;
        $user->username = Input::get('username');
        $user->password = bcrypt(Input::get('username'));
        $user->role_id = 2;
        $user->is_aactive = 1;
        $user->save();

        if($user->id == null)
        {
            die("User not created yet!");
        }


        $faculty = new Faculty;
        $faculty->user_id = $user->id;
        $faculty->teacher_code = Input::get('code');
        $faculty->is_active = 1;
        $faculty->save();


        $request->session()->flash('alert-success', 'Faculty was created Successfully!');
        return Redirect::to('faculty/create');
    }

    public function offeredCourses(Request $request)
    {
        $semesterController = new SemesterController();
        $offeredSemester = $semesterController->offeredSemester();
        $offeredCourses = SemesterCourseFaculty::all();

        echo
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
