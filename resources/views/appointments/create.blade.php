@extends('app')

@section('content')
<div class="d-flex justify-content-center">
    <h3>Enter an appointment: </h3>
</div>
<div class="d-flex justify-content-center">
    <form action="/appointments/create" method="post">
        @csrf
        <div class="row mb-3 has-validation">
            <label for="name" class="col-10 col-form-label">Choose a doctor:</label>
            <div class="col-sm-10">
            <select class="form-select form-control" aria-label="Default select example" name="doctor_id" required>
                @foreach($doctors as $doctor)
                <!-- <option name="doctor_id" value="1">{{$doctor->name}}</option> -->
                <option value="{{ $doctor->id }}">{{ $doctor->name  }}</option>
                @endforeach                
            </select>
            </div>        
            @error('doctor_id')
            <div class="invalid-feedback d-block">{{ $errors->first('doctor_id') }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="patient_name" class="col-10 col-form-label">Patient's name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('patient_name') is-invalid @enderror" id="specId" name="patient_name" value="{{old('patient_name')}}">
            </div>
            @error('patient_name')
            <div class="invalid-feedback d-block">{{ $errors->first('patient_name') }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="institutuion" class="col-10 col-form-label">Date from:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control @error('time_from') is-invalid @enderror" id="inst" name="time_from" required value="{{old('time_from')}}">
            </div>
            @error('time_form')
            <div class="invalid-feedback d-block">{{ $errors->first('time_from') }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="institutuion" class="col-10 col-form-label">Date to:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control @error('time_from') is-invalid @enderror" id="inst" name="time_to" required value="{{old('time_to')}}">
            </div>
            @error('time_to')
            <div class="invalid-feedback d-block">{{ $errors->first('time_to') }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="has_occured">
                    <label class="form-check-label" for="gridCheck1">
                        Has occured
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add an appointment</button>
    </form>
</div>
@endsection