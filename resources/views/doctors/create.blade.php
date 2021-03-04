@extends('app')

@section('content')
<div class="d-flex justify-content-center">
@if($user)
<!-- <h3>Enter a new doctor: </h3> -->
<doctors :user="{{ $user }}"></doctors>
<!-- <doctors :user="{{ $user }}" locale = "{{ app()->getLocale()}}" En = "locale/{{ app()->getLocale()}}" ></doctors> -->
<!-- </div>
<div class="d-flex justify-content-center">
    <form action="/doctor/create" method="post">
    @csrf 
    <div class="row mb-3 has-validation">
        <label for="name" class="col-10 col-form-label">Name:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameText" name="name" required value="{{old('name')}}">
        </div>
        @error('name')
         <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
        @enderror
        <input type="text" hidden name="user_id" value="{{$user}}" >
    </div>
    <div class="row mb-3">
        <label for="speciality" class="col-10 col-form-label">Speciality:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('speciality') is-invalid @enderror" id="specId" name="speciality" required value="{{old('speciality')}}">
        </div>
        @error('name')
         <div class="invalid-feedback d-block">{{ $errors->first('speciality') }}</div>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="institutuion" class="col-10 col-form-label">Institution:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('institution') is-invalid @enderror" id="inst" name="institution" required value="{{old('institution')}}">
        </div>
        @error('institution')
         <div class="invalid-feedback d-block">{{ $errors->first('institution') }}</div>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="is_active" >
            <label class="form-check-label" for="gridCheck1">
            Active
            </label>
        </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Add a doctor</button>    
    </form> -->
    @else
<a href="/"><h3>Please log in </h3></a>
@endif
</div>

@endsection
