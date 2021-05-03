<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\ClassStudent;
use App\Models\ClassRoom;
use App\Models\ClassCourse;
use App\Models\Exercise;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        return view ('frontend.login');
    }
    //login 
    public function postLogin(Request $request){
        if(Auth::guard('student')->attempt($request->only('username','password'))){
            return redirect()->route('frontend.indexStudent')->with('success','Đăng nhập thành công');
        }elseif(Auth::guard('teacher')->attempt($request->only('username','password'))){
            return redirect()->route('frontend.indexTeacher')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
    //logout 
    public function logout(){
        if(Auth::guard('student')){
            Auth::guard('student')->logout();
        }else{
            Auth::guard('teacher')->logout();
        }
        return redirect()->route('frontend.login');
    }

    public function index()
    {

    }
    //student
    public function indexStudent()
    {
        if(Auth::guard('student')){
            $stu = ClassStudent::where('id_student','=',Auth::guard('student')->user()->id)->paginate('4');
            return view('frontend.student.index', compact('stu'));
        }
    }
    public function StudentClassCourse($id_class)
    {
        $class = ClassRoom::find($id_class);
        $course = ClassCourse::where('id_class', $id_class)->get();
        return view('frontend.student.class', compact('class','course','id_class'));
    }
    public function studentViewEx($id_class, $id)
    {
        $class = ClassRoom::find($id_class);
        $ex = Exercise::where('id_class_course',$id)->orderBy('created_at','ASC')->get();
        
        return view('frontend.student.ex', compact('ex','class'));
    }
    //Teacher
    public function indexTeacher()
    {
        if(Auth::guard('teacher')){
            $tc = ClassCourse::where('id_teacher','=',Auth::guard('teacher')->user()->id)->get();
            return view('frontend.teacher.index',compact('tc'));
        }
    }
    public function teacherEx($id){
        $ex = Exercise::where('id_class_course',$id)->orderBy('created_at','ASC')->get();
        return view('frontend.teacher.ex',compact('ex', 'id'));
    }
    public function teacherAddExercise($id){
        return view('frontend.teacher.addEx',compact('id'));
    }

    public function postTeacherAddExercise($id, Request $req){
        $ex = Exercise::where('id', $id)->create([
            'id_class_course' => $id,
            'ex' => $req->ex,
            'finalDate' =>$req->finalDate,
        ]);
        if($ex){
            return redirect()->route('frontend.teacherEx',$id)->with('classcreate-success','Delete success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
