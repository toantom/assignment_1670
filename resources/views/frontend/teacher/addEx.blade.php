@extends('frontend.master');

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{route('frontend.postTeacherAddExercise',$id)}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                      <label for="">Link Exercise</label>
                      <input type="text"
                        class="form-control" name="ex" placeholder="Exercise Link">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="">Submit Date</label>
                      <input type="date"
                        class="form-control" name="finalDate" placeholder="Submit Date">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection