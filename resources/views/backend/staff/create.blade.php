@extends('backend.master')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create Account For Staff</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Create Staff</li>
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
                    <form action="{{route('staff.store')}}" method="post">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                            <label for="">Name of Staff</label>
                            <input type="text"
                                class="form-control" name="name" placeholder="">
                            </div>
                            <div class="form-group">
                            <label for="">Username</label>
                            <input type="text"
                                class="form-control" name="username" placeholder="">
                            </div>
                            <div class="form-group">
                            <label for="">Password</label>
                            <input type="password"
                                class="form-control" name="password" placeholder="">
                            </div>
                            <div class="form-group">
                            <label for="">Confirm password</label>
                            <input type="password"
                                class="form-control" name="password_confirmation" placeholder="">
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