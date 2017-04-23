<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class StudentController extends Controller
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
        $programs = Program::all();

        $content = view('student/create')->with(['programs'=>$programs]);
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
            'program' => 'required',
            'regCode' => 'required|max:20',
            'stdCode' => 'required|max:20'
        ]);

        $user = new User;
        $user->username = Input::get('username');
        $user->password = bcrypt(Input::get('username'));
        $user->role_id = 3;
        $user->is_aactive = 1;
        $user->save();

        if($user->id == null)
        {
            die("User not created yet!");
        }


        $student = new Student;
        $student->user_id = $user->id;
        $student->program_id = Input::get('program');
        $student->reg_code = Input::get('regCode');
        $student->student_code = Input::get('stdCode');
        $student->is_active = 1;
        $student->save();


        $request->session()->flash('alert-success', 'Student was created Successfully!');
        return Redirect::to('student/create');
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
