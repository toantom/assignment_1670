<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentDetail;
use App\Models\ClassStudent;
use App\Models\ClassCourse;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stu = Student::all();
        return view('backend.student.index', compact('stu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'username' => $request->username,
            'password'=> Hash::make($request->password),
        ]);
        
        if($student){
            StudentDetail::create([
                'id_student' => $student->id,
            ]);
            return redirect()->route('student.index')->with('addstu-success','Create success');
        }else{
            return redirect()->back()->with('addstu-error','Create not success');
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
        $stu = Student::find($id);
        $stu_detail = StudentDetail::where('id_student',$id)->first();
        $class = ClassStudent::where('id_student', $id)->get();
        // foreach($class as $item){
        //     $course = ClassCourse::where('id_class', $item->id_class)->get();
        //     foreach($course as $item){
        //         print_r($item->count());
        //     }
        // }
        return view('backend.student.detail', compact('stu','stu_detail', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $stu = Student::where('id',$id)->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);
        $detail = StudentDetail::where('id_student',$id)->update([
            'gender' => $request->gender,
            'dob' => $request->dob,
            'ielst' => $request->ielst,
            'hobby' => $request->hobby,
        ]);

        if($stu && $detail){
            return redirect()->route('student.show', $id)->with('updatestu-success','Create success');
        }else{
            return redirect()->back()->with('updatestu-error','Create not success');
        }
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

    public function inforStudent($id)
    {
        $stu = Student::find($id);
        $infor = StudentDetail::where('id_student', $id)->first();
        return view ('frontend.student.infor', compact('stu','infor'));
    }

    public function editInforStudent($id, Request $req)
    {
        $stu = Student::where('id',$id)->update([
            'name' => $req->name,
            'username' => $req->username,
        ]);
        $detail = StudentDetail::where('id_student',$id)->update([
            'gender' => $req->gender,
            'dob' => $req->dob,
            'ielst' => $req->ielst,
            'hobby' => $req->hobby,
        ]);

        if($stu && $detail){
            return redirect()->route('frontend.inforStudent', $id)->with('updatestu-success','Create success');
        }else{
            return redirect()->back()->with('updatestu-error','Create not success');
        }
    }
}
