@extends('backend.master')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create Course</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('course.index')}}">List of Course</a></li>
        <li class="breadcrumb-item active">Create Course</li>
        </ol>
    </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('course.store')}}" method="post">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                            <label for="">Name of Course</label>
                            <input type="text"
                                class="form-control" name="courseName" placeholder="">
                            </div>
                            <div class="form-group">
                            <label for="">Course Code</label>
                            <input type="text"
                                class="form-control" name="courseCode" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="">Description</label>
                              <textarea class="form-control" name="description" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" onclick="return sweetSubmit('Xác nhận tạo phiếu?')" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection