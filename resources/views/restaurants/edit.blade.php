
@extends('layouts.plantilla')

@section('content')

<br><br>
    <div class="row">
        <div class="col">
            <h1>Edit Restaurant</h1>
        </div>
        <div class="col">
            <a href="{{route('restaurants.index')}}" class="btn btn-success">BACK</a>
        </div>
    </div>
<br><br>

<form action="{{route('restaurants.update',['id' => $restaurant->id])}}" method="POST">

    @csrf

    @method('put')

    <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Name" value="{{old('name',$restaurant->name)}}">
    @error('name')
    <small>*{{$message}}</small>
        <br>
        <br>
    @enderror
    <input type="text" class="form-control mb-3" name="phone" id="phone" placeholder="Phone" value="{{$restaurant->phone}}">

    <input type="text" class="form-control mb-3" name="score" id="score" placeholder="Score" value="{{$restaurant->score}}">

    <div class="form-group mb-2">

        <h4>Category</h4>

        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
        
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        
        </select>

      </div>

      <div class="form-group mb-2">

        <h4>isVacunado</h4>

        <select class="form-select" aria-label="Default select example" name="isVacunado" id="isVacunado">
            <option value="yes">yes</option>
            <option value="no">no</option>
        </select>

      </div>

      <button type="submit" class="btn btn-warning">SEND</button>
    
</form>

@endsection()