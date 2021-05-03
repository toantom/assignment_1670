@extends('frontend.master')

@section('main')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="rounded-circle"
                             src="https://icheck.com.vn/wp-content/uploads/2020/11/avatar-default.png"
                             alt="User profile picture" width="128px" height="128px">
                      </div>
      
                      <h3 class="profile-username text-center">{{$tc->name}}</h3>
      
                      <p class="text-muted text-center">{{$tc->username}}</p>
      
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Information
                    </div>
                    <div class="card-body">
                      <form class="form-horizontal" action="{{route('frontend.editInforTeacher',$tc->id)}}" method="POST">
                        @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{$tc->name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="{{$tc->username}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gender">
                              <option value="1" @if($infor->gender == 1)selected @endif>Male</option>
                              <option value="2" @if($infor->gender == 2)selected @endif>Female</option>
                              <option value="3" @if($infor->gender == 3)selected @endif>Other</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="dob" value="{{$infor->dob}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Diploma</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="diploma">{{$infor->diploma}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning">Edit</button>
                        </div>
                      </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection