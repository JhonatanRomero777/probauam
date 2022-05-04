@extends('layouts.plantilla')

@section('content')

<br><br>
    <div class="row">
        <div class="col">
            <a href="{{route('restaurants.create')}}" class="btn btn-info">Create Restaurant</a>
        </div>
        <div class="col">
            <h1>Bienvenido</h1>
        </div>
    </div>
<br><br>

<div class="card">

    <div class="card-body">

        <table class="table table-striped">

            @foreach ($restaurants as $restaurant)

                <tr>
                    <td>{{$restaurant->id}}</td>
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->phone}}</td>
                    <td>{{$restaurant->score}}</td>
                    <td>{{$restaurant->isVacunado}}</td>

                    {{-- @php
                        $category = App\Models\Category::find($restaurant->category_id);
                    @endphp --}}

                    <td>{{$restaurant->category()->name}}</td>

                    <td><a href="{{route('restaurants.edit',['id' => $restaurant->id])}}" class="btn btn-warning">EDIT</a></td>
                    <td><form action="{{route('restaurants.destroy',['id' => $restaurant->id])}}" method="POST">
                        @csrf
        
                        @method('delete')
        
                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                    </form></td>
                </tr>

            @endforeach

        </table>

    </div>

</div>

@endsection()
