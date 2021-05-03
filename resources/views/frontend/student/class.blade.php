@extends('frontend.master')

@section('main')
<h2>List course of <span class="badge badge-primary">{{$class->classCode}}</span></h2>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Exercise</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $key => $item)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$item->course->courseCode}}</td>
                                    <td>{{$item->course->courseName}}</td>
                                    <td>{{$item->startDate}}</td>
                                    <td>{{$item->endDate}}</td>
                                    <td><a name="" class="btn btn-primary" href="{{route('frontend.studentViewEx', [$id_class, $item->id])}}" role="button">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection