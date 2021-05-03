@extends('backend.master')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
              <li class="breadcrumb-item active">List of Student</li>
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
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body table-responsive">
                      <table id="table-pro" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name of Student</th>
                            <th>Username</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        @foreach ($stu as $key => $item)
                        <tbody>
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>
                              <a href="{{route('student.show', $item->id)}}">
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
{{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- sweetalert student --}}
@if(Session::has('addstu-success'))
  <script>
    swal("Success","Add Student Success", "success");
  </script>
@endif
@if(Session::has('addstu-error'))
  <script>
    swal("Fail","Add Student Not Success", "error");
  </script>
@endif
@if(Session::has('updatestu-success'))
  <script>
    swal("Success","Edit Student Success", "success");
  </script>
@endif
@if(Session::has('updatestu-error'))
  <script>
    swal("Fail","Edit Student Not Success", "error");
  </script>
@endif
{{-- @if(Session::has('delstu-success'))
  <script>
    swal("Thành công","Bạn đã xóa danh mục thành công", "success");
  </script>
@endif
@if(Session::has('delstu-error'))
  <script>
    swal("Thất bại","Bạn đã xóa danh mục không thành công", "error");
  </script>
@endif --}}
@endsection