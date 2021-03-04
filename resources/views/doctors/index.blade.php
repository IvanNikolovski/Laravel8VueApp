@extends('app')

@section('content')
<div class="d-flex justify-content-center">
    <h3>Enter a new doctor: </h3> <br/>
</div>
<ul class="list-group">
@foreach($doctors as $doctor)
<li class="list-group-item">
    <a href="/doctor/show/{{$doctor->id}}" >{{$doctor->name}} {{$doctor->speciality}}</a>
</li>
@endforeach
</ul>
</div>
@endsection
