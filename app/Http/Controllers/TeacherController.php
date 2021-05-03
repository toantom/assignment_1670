<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\TeacherDetail;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::all();
        return view('backend.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tc = Teacher::create([
            'name' => $request->name,
            'username' => $request->username,
            'password'=> Hash::make($request->password),
        ]);
        if($tc){
            TeacherDetail::create([
                'id_teacher' => $tc->id,
            ]);
            return redirect()->route('teacher.index')->with('stucreate-success','Create success');
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
        $tc = Teacher::find($id);
        $tc_detail = TeacherDetail::where('id_teacher',$id)->first();
        return view('backend.teacher.detail', compact('tc', 'tc_detail'));
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
        $tc = Teacher::where('id',$id)->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);
        $detail = TeacherDetail::where('id_teacher',$id)->update([
            'gender' => $request->gender,
            'dob' => $request->dob,
            'diploma' => $request->diploma,
        ]);

        if($tc && $detail){
            return redirect()->route('teacher.show', $id)->with('stucreate-success','Create success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
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

    public function inforTeacher($id)
    {
        $tc = Teacher::find($id);
        $infor = TeacherDetail::where('id_teacher', $id)->first();
        return view ('frontend.teacher.infor', compact('tc','infor'));
    }
    public function editInforTeacher($id, Request $req)
    {
        $tc = Teacher::where('id',$id)->update([
            'name' => $req->name,
            'username' => $req->username,
        ]);
        $detail = TeacherDetail::where('id_teacher',$id)->update([
            'gender' => $req->gender,
            'dob' => $req->dob,
            'diploma' => $req->diploma,
        ]);

        if($tc && $detail){
            return redirect()->route('frontend.inforTeacher', $id)->with('stucreate-success','Create success');
        }else{
            return redirect()->back()->with('stucreate-error','Create not success');
        }
    }
}
