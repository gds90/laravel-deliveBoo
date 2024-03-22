@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('/storage/' . $dish->cover_image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->name }}</h5>

                        <p>Prezzo: {{ $dish->price }}</p>
                        <p class="card-text">Descrizione: {{ $dish->description }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>

                    </div>
                </div>

            </div>

        </div>
    @endsection
