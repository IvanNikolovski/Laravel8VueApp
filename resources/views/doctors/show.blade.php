@extends('app')

@section('content')
<div class="d-flex justify-content-center">
<h3>See doctor's info: </h3>
</div>
<show-doctor :doctor="{{$doctor}}"></show-doctor>
<!-- <div class="d-flex justify-content-center">
    <form action="/doctor/delete/{{$doctor->id}}" method="post">
    @csrf 
    <div class="row mb-3">
        <label for="name" class="col-10 col-form-label">Name:</label>
        <div class="col-sm-10">
        <label for="name" class=" form-control col-10 col-form-label">{{$doctor->name}}</label>        
        </div>
    </div>
    <div class="row mb-3">
        <label for="speciality" class="col-10 col-form-label">Speciality:</label>
        <div class="col-sm-10">
        <label for="name" class=" form-control col-10 col-form-label">{{$doctor->speciality}}</label>
        </div>
    </div>
    <div class="row mb-3">
        <label for="institutuion" class="col-10 col-form-label">Institution:</label>
        <div class="col-sm-10">
        <label for="name" class=" form-control col-10 col-form-label">{{$doctor->institution}}</label>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="is_active" @if($doctor->is_active) checked @endif" disabled>
            <label class="form-check-label" for="gridCheck1">
            @if($doctor->is_active) active @else not active @endif 
            </label>
        </div>
        </div>
    </div>
    <button type="submit" class="btn btn-danger">Delete this doctor</button>
    </form>
</div> -->
@endsection
