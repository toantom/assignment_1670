@extends('backend.master')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('class.index')}}">List of Class</a></li>
                <li class="breadcrumb-item active">Class Detail</li>
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
                    {{-- <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" 
                        @if ($stu_detail->avatar != null)
                            src="{{$stu_detail->avatar}}"
                        @else
                            src="https://icheck.com.vn/wp-content/uploads/2020/11/avatar-default.png"
                        @endif 
                            alt="User profile picture" width="128px" height="128px">
                    </div> --}}
                    
                    <h3 class="profile-username text-center">{{$class->classCode}}</h3>
    
                    {{-- <p class="text-muted text-center">Student</p> --}}
    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Student</b> <a class="float-right">
                            {{$class->studentNum->count()}}
                        </a>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modal-default">
                      ADD STUDENT
                    </button>
                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-info">
                      ADD COURSE
                    </button>
                    <a href="#" class="btn btn-danger btn-block"><b>DELETE CLASS</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">ADD STUDENT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="card-body table-responsive">
                        <table id="" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($stu as $key => $item)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->username}}</td>
                              <td>
                                <form action="{{route('backend.class.addStu',[$class->id,$item->id])}}" method="POST">
                                  @csrf 
                                  <a href="" onclick=" return confirm('Are you sure to add student {{$item->name}} to class {{$class->classCode}}')"><button class="btn btn-block btn-primary btn-sm" 
                                  @foreach ($class_stu as $stu)
                                    @if ($stu->id_student == $item->id)
                                      disabled
                                    @endif
                                  @endforeach
                                  >Add</button></a>                            
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="modal fade" id="modal-info">
              <div class="modal-dialog">
                <div class="modal-content bg-info">
                  <div class="modal-header">
                    <h4 class="modal-title">ADD COURSE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="card-body table-responsive">
                        <table id="" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Course Code</th>
                              <th>Course Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($course as $key => $item)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$item->courseCode}}</td>
                              <td>{{$item->courseName}}</td>
                              <td>
                                <form action="{{route('backend.class.addCourse',[$class->id, $item->id])}}" method="POST">
                                  @csrf 
                                  <a href="" onclick=" return confirm('Are you sure to add course {{$item->courseCode}} to class {{$class->classCode}}')"><button class="btn btn-block btn-primary btn-sm" 
                                  @foreach ($class_course as $course)
                                    @if ($course->id_course == $item->id)
                                      disabled
                                    @endif
                                  @endforeach
                                  >Add</button></a>                            
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#student" data-toggle="tab">Student</a></li>
                        <li class="nav-item"><a class="nav-link" href="#course" data-toggle="tab">Course</a></li>
                    </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="student">
                            <!-- table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                  <table id="table-pro" class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Student Name</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($class_stu as $key => $item)
                                          <tr>
                                              <td>{{$key + 1}}</td>
                                              <td>{{$item->student->name}}</td>
                                              <td>
                                                <form action="{{route('backend.class.destroyStu',[$class->id,$item->id_student])}}" method="POST">
                                                  @method('DELETE') @csrf 
                                                  <a href="" onclick=" return confirm('Are you sure to remove student {{$item->student->name}} from class {{$class->classCode}}')"><button class="btn btn-block btn-danger btn-sm">Delete</button></a>                            
                                                </form>
                                              </td>
                                          </tr>    
                                          @endforeach
                                          
                                      </tbody>
                                  </table>
                                </div>
                            </div>
                            <!-- /.table -->      
                          </div>
                          <div class="tab-pane" id="course">
                            <!-- table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                  <table id="table-pro" class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Course Code</th>
                                              <th>Course Name</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($class_course as $key => $item)
                                            <tr>
                                              <td>{{$key+1}}</td>
                                              <td>{{$item->course->courseCode}}</td>
                                              <td>{{$item->course->courseName}}</td>
                                              <td>
                                                <a href="{{route('backend.class.addSchedule',[$class->id, $item->id])}}"><button type="button" class="btn btn-info btn-block btn-sm mb-1">
                                                  Add Detail
                                                </button></a>
                                                <form action="{{route('backend.class.destroyCourse',[$class->id,$item->id_course])}}" method="POST">
                                                  @method('DELETE') @csrf 
                                                  <a href="" onclick=" return confirm('Are you sure to remove course {{$item->course->courseCode}} from class {{$class->classCode}}')"><button class="btn btn-block btn-danger btn-sm">Delete</button></a>                            
                                                </form>
                                                @endforeach
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                                </div>
                            </div>
                            <!-- /.table -->      
                          </div>

                          {{-- <!-- /.tab-pane -->   
                          <div class="tab-pane" id="info">
                            <form class="form-horizontal" action="{{route('student.update',$stu->id)}}" method="POST">
                                @csrf @method('PUT')
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="{{$stu->name}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="username" value="{{$stu->username}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="gender">
                                      <option value="1" @if($stu_detail->gender == 1)selected @endif>Male</option>
                                      <option value="2" @if($stu_detail->gender == 2)selected @endif>Female</option>
                                      <option value="3" @if($stu_detail->gender == 3)selected @endif>Other</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" name="dob" value="{{$stu_detail->dob}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Ielst</label>
                                <div class="col-sm-10">
                                  <input type="float" step="0.001" class="form-control" name="ielst" value="{{$stu_detail->ielst}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Hobby</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="hobby">{{$stu_detail->hobby}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" class="btn btn-warning">Edit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.tab-pane --> --}}
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>            
</section>
@endsection