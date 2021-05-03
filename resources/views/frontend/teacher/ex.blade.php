@extends('frontend.master')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a name="" id="" class="btn btn-primary mt-1 mb-1" href="{{route('frontend.teacherAddExercise', $id)}}" role="button">Add Exercise</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Exercise</th>
                            <th>Create Date</th>
                            <th>Final Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ex as $key => $item)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td><a href="{{$item->ex}}" target="_blank" rel="noopener noreferrer">Exercise {{$key+1}}</a></td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->finalDate}}</td>
                            <td>
                                @if ($item->status == 1)
                                    Pending
                                @else
                                    Graded
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection