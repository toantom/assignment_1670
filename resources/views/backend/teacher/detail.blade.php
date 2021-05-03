@extends('backend.master')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teacher Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">List of Teacher</a></li>
                <li class="breadcrumb-item active">Teacher Detail</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" 
                        @if ($tc_detail->avatar != null)
                            src="{{$tc_detail->avatar}}"
                        @else
                            src="https://icheck.com.vn/wp-content/uploads/2020/11/avatar-default.png"
                        @endif 
                            alt="User profile picture" width="128px" height="128px">
                    </div>
                    
                    <h3 class="profile-username text-center">{{$tc->name}}</h3>
    
                    <p class="text-muted text-center">Teacher</p>
    
                    {{-- <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Status</b> <a class="float-right">
                            @if ($stu->status == 1)
                                Studying
                            @endif
                            @if ($stu->status == 2)
                                Reserved
                            @endif
                            @if ($stu->status == 3)
                                Graduated
                            @endif
                        </a>
                        </li>
                    </ul> --}}
    
                    <a href="#" class="btn btn-danger btn-block"><b>DELETE</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#course" data-toggle="tab">Course</a></li>
                        <li class="nav-item"><a class="nav-link" href="#info" data-toggle="tab">Information</a></li>
                    </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="course">
                            <!-- table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                  <table id="table-pro" class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Course</th>
                                              <th>Class</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>1</td>
                                              <td>2</td>
                                              <td>3</td>
                                          </tr>
                                      </tbody>
                                  </table>
                                </div>
                            </div>
                            <!-- /.table -->      
                          </div>
                          <!-- /.tab-pane -->   
                          <div class="tab-pane" id="info">
                            <form class="form-horizontal" action="{{route('teacher.update',$tc->id)}}" method="POST">
                                @csrf @method('PUT')
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
                                      <option value="1" @if($tc_detail->gender == 1)selected @endif>Male</option>
                                      <option value="2" @if($tc_detail->gender == 2)selected @endif>Female</option>
                                      <option value="3" @if($tc_detail->gender == 3)selected @endif>Other</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" name="dob" value="{{$tc_detail->dob}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Diploma</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="diploma">{{$tc_detail->diploma}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" class="btn btn-warning">Edit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>            
</section>
@endsection