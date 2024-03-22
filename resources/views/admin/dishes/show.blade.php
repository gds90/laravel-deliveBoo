@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <img src="{{ $dish->cover_image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2>{{ $dish->name }}</h2>
                        <p>Prezzo: {{ $dish->price }}</p>
                        <p>Descrizione: {{ $dish->description }}</p>

                    </div>
                </div>

            </div>
        </div>
    @endsection
