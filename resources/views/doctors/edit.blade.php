@extends('app')

@section('content')
<div class="d-flex justify-content-center">
<!-- <h3>Edit doctor's info: </h3> -->
<h3>Edit doctor's info: </h3>
<!-- <h2> @lang('messages.welcome')</h2> -->
</div>
<edit-doctor :doctor = "{{ $doctor }}"></edit-doctor>
<!-- <div class="d-flex justify-content-center">
    <form action="/doctor/update/{{$doctor->id}}" method="post">
    @csrf 
    <div class="row mb-3">
        <label for="name" class="col-10 col-form-label">Name:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameText" name="name" required value="{{$doctor->name}}">
        </div>
        @error('name')
         <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="speciality" class="col-10 col-form-label">Speciality:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('speciality') is-invalid @enderror" id="nameText" name="speciality" requred value="{{$doctor->speciality}}">
        </div>
        @error('speciality')
         <div class="invalid-feedback d-block">{{ $errors->first('speciality') }}</div>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="institutuion" class="col-10 col-form-label">Institution:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('institution') is-invalid @enderror" id="nameText" name="institution" required value="{{$doctor->institution}}">
        </div>
        @error('institution')
         <div class="invalid-feedback d-block">{{ $errors->first('institution') }}</div>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="is_active" @if($doctor->is_active) checked @endif>
            <label class="form-check-label" for="gridCheck1">
            Active
            </label>
        </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit a doctor</button>
    </form>
</div> -->
@endsection
