<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view ('backend.login');
    }
    //login admin
    public function postLogin(Request $request){
        if(Auth::guard('admin')->attempt($request->only('username','password'))){
            return redirect()->route('backend.index')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
    //logout admin
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('backend.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stu = Student::all()->count();
        $class = ClassRoom::all()->count();
        return view('backend.index', compact('stu', 'class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
