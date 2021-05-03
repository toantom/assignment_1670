@extends('backend.master')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course Schedule</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">List of Class</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Class Detail</a></li>
            <li class="breadcrumb-item active">Course Schedule</li>
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
                    <form action="{{route('backend.class.postAddSchedule', [$schedule->id_class, $schedule->id])}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                              <label for="">Teacher</label>
                              <select class="form-control" name="id_teacher">
                                @foreach ($tc as $item)
                                    <option value="{{$item->id}}" @if ($schedule->id_teacher == $item->id)
                                        selected
                                    @endif>{{$item->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="">Frametime</label>
                              <select class="form-control" name="frametime">
                                <option value="1" @if ($schedule->frametime == 1)
                                    selected
                                @endif>2-4-6</option>
                                <option value="2" @if ($schedule->frametime == 2)
                                    selected
                                @endif>3-5-7</option>
                              </select>
                            </div>
                            <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" class="form-control" name="startDate" value="{{$schedule->startDate}}">
                            </div>
                            <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date"
                                class="form-control" name="endDate" value="{{$schedule->endDate}}">
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