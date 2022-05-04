
@extends('layouts.plantilla')

@section('content')

<br><br>
    <div class="row">
        <div class="col">
            <h1>Create Restaurant</h1>
        </div>
        <div class="col">
            <a href="{{route('restaurants.index')}}" class="btn btn-success">BACK</a>
        </div>
    </div>
<br><br>

<form action="{{route('restaurants.store')}}" method="POST">

    @csrf

    <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Name">

    @error('name')
        <small>*{{$message}}</small>
        <br>
        <br>
    @enderror

    <input type="text" class="form-control mb-3" name="phone" id="phone" placeholder="Phone">

    @error('phone')
        <small>*{{$message}}</small>
        <br>
        <br>
    @enderror

    <input type="number" class="form-control mb-3" name="score" id="score" placeholder="Score">

    @error('score')
        <small>*{{$message}}</small>
        <br>
        <br>
    @enderror

    <div class="form-group mb-2">

        <h4>Category</h4>

        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
        
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        
        </select>

      </div>

      <div class="form-group mb-2">

        <h4>isVacunado Select</h4>

        <select class="form-select" aria-label="Default select example" name="isVacunado" id="isVacunado">
            <option value="yes">yes</option>
            <option value="no">no</option>
        </select>

      </div>

      <div class="form-group mb-2">

        <h4>isVacunado Checkbox</h4>

        <input type="checkbox" name="ensayo" value="binario">Binario
        <input type="checkbox" name="ensayo" value="pedigree">yes
        <input type="checkbox" name="ensayo" value="noPedi">no

      </div>

      <button type="submit" class="btn btn-info">SEND</button>
    
</form>

@endsection()