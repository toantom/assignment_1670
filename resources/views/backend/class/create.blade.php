@extends('backend.master')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create Class</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('class.index')}}">List of Class</a></li>
        <li class="breadcrumb-item active">Create Class</li>
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
                    <form action="{{route('class.store')}}" method="post">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                            <label for="">Class Code</label>
                            <input type="text"
                                class="form-control" name="classCode" placeholder="">
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