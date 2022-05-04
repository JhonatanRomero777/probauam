
@extends('layouts.plantilla')

@section('content')

<br><br>
    <div class="row">
        <div class="col">
            <h1>Welcom to {{$restaurant->name}}</h1>
        </div>
        <div class="col">
            <a href="{{route('restaurants.index')}}" class="btn btn-success">BACK</a>
        </div>
    </div>
<br><br>

@endsection()