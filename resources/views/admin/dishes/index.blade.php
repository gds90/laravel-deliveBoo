@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content d-flex align-items-center">
                    <div class="fw-bold">Aggiungi un nuovo piatto: </div>
                    <a class="btn btn-primary fw-bold m-3" href="{{ Route('admin.dishes.create') }}"
                        role="button">Aggiungi</a>
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Immagine di Copertina</th>
                            <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                            <tr>
                                <th scope="row">{{ $dish->id }}</th>
                                <td>{{ $dish->name }}</td>
                                <td>{{ $dish->description }}</td>
                                <td>{{ $dish->price }}</td>
                                <td>{{ $dish->cover_image }}</td>
                                <td>{{ $dish->slug }}</td>
                                <td>
                                    <div class="button-container d-flex">
                                        <a class="btn btn-warning  m-2"
                                            href="{{ route('admin.dishes.edit', ['dish' => $dish['id']]) }}">Edit
                                            dish</a>
                                        <form class=" m-2"
                                            action="{{ route('admin.dishes.destroy', ['dish' => $dish['id']]) }}"
                                            method="POST"
                                            onsubmit="return confirm('sei sicuro di voler eliminare il piatto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}"
                                            class="btn btn-primary m-2"><i class="fas fa-eye"></i></a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
