<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Models\ClassStudent;
use App\Models\ClassCourse;
use App\Models\Student;
use App\Models\Course;
use App\Models\Teacher;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $class = ClassRoom::all();
        return view('backend.class.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classR = ClassRoom::create([
            'classCode' => $request->classCode
        ]);
        if($classR){
            return redirect()->route('class.index')->with('classcreate-success','Create success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stu = Student::all();
        $course = Course::all();
        $teacher = Teacher::all();
        $class = ClassRoom::find($id);
        $class_stu = ClassStudent::where('id_class',$id)->get();
        $class_course = ClassCourse::where('id_class',$id)->get();
        return view('backend.class.detail', compact('class','class_stu','stu', 'course', 'class_course', 'teacher'));
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
    public function addStu($id, $id_student)
    {
        $class_stu = ClassStudent::create([
            'id_class' => $id,
            'id_student' => $id_student
        ]);
        if($class_stu){
            return redirect()->route('class.show',$id)->with('classcreate-success','Add success');
        }else{
            return redirect()->back()->with('stucreate-error','Add not success');
        }
    }
    public function destroyStu($id, $id_student)
    {
        $stu = ClassStudent::where('id_class', $id)->where('id_student', $id_student)->delete();
        if($stu){
            return redirect()->route('class.show',$id)->with('classcreate-success','Delete success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
        }

    }
    public function addCourse($id, $id_course)
    {
        $class_course = ClassCourse::create([
            'id_class' => $id,
            'id_course' => $id_course
        ]);
        if($class_course){
            return redirect()->route('class.show',$id)->with('classcreate-success','Add success');
        }else{
            return redirect()->back()->with('stucreate-error','Add not success');
        }
    }
    public function destroyCourse($id, $id_course)
    {
        $course = ClassCourse::where('id_class', $id)->where('id_course', $id_course)->delete();
        if($course){
            return redirect()->route('class.show',$id)->with('classcreate-success','Delete success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
        }
    }

    public function addSchedule($id, $id_class_course)
    {
        $tc = Teacher::all();
        $schedule = ClassCourse::find($id_class_course);
        return view ('backend.class.schedule', compact('tc','schedule'));
    }

    public function postAddSchedule(Request $req, $id, $id_class_course)
    {
        $sche = ClassCourse::where('id',$id_class_course)->update([
            'id_teacher' => $req->id_teacher,
            'frametime' =>$req->frametime,
            'startDate' =>$req->startDate,
            'endDate' =>$req->endDate,
        ]);
        if($sche){
            return redirect()->route('class.show',$id)->with('classcreate-success','Delete success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
        }
    }
}
