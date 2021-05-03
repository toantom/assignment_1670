@extends('frontend.master')
@section('main')
<!-- Jumbotron Header -->
<header class="jumbotron my-4">
    <h1 class="display-3">A Warm Welcome!</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
    <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
</header>
  
<!-- Page Features -->
<div class="row text-center">
@foreach ($tc as $item)
    <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
        <div class="card-body">
        <h4 class="card-title">{{$item->course->courseCode}}</h4>
        <p class="card-text">{{$item->course->courseName}}</p>
        <p class="card-text">{{$item->class->classCode}}</p>
        </div>
        <div class="card-footer">
        <a href="{{route('frontend.teacherEx', $item->id)}}" class="btn btn-primary">View Exercise</a>
        </div>
    </div>
    </div>
@endforeach
</div>
@endsection