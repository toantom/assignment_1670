@extends('backend.master')
@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
              <li class="breadcrumb-item active">List of Course</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="col-md-2">
            <a href="{{route('course.create')}}"><button type="button" class="btn btn-block btn-primary mb-1">Create Course</button></a> 
          </div>
            <div class="row">
              <div class="col-md-12">
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
                      @foreach ($course as $key => $item)
                      <tbody>
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$item->courseCode}}</td>
                          <td>{{$item->courseName}}</td>
                          <td>
                            <a href="{{route('course.show', $item->id)}}">
                              <button type="button" class="btn btn-block btn-outline-primary btn-sm">Detail</button>
                            </a>
                          </td>
                        </tr>
                      </tbody>    
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection