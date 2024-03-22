@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12">


                @foreach ($restaurants as $restaurant)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('/storage/' . $restaurant->cover_image) }}"
                            alt="{{ $restaurant->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $restaurant->p_iva }}</li>
                                <li class="list-group-item">{{ $restaurant->address }}</li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form class=" m-2"
                                action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant['id']]) }}"
                                method="POST" onsubmit="return confirm('sei sicuro di voler eliminare il fumetto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    {{--                             <div class="button-container d-flex">
                                <a class="btn btn-warning  m-2"
                                    href="{{ route('admin.cars.edit', ['car' => $car['id']]) }}">Edit
                                    car</a>
                                <form class=" m-2" action="{{ route('admin.cars.destroy', ['car' => $car['id']]) }}"
                                    method="POST" onsubmit="return confirm('sei sicuro di voler eliminare il fumetto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('admin.cars.show', ['car' => $car->id]) }}" class="btn btn-primary m-2"><i
                                        class="fas fa-eye"></i></a>
                            </div> --}}
                @endforeach


            </div>
        </div>
    </div>
@endsection
