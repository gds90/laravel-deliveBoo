@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning-subtle ">Modifica piatto: <span
                            class="fw-bold">{{ $dish->name }}</span></div>

                    <div class="card-body bg-warning ">
                        <form method="POST" action="{{ route('admin.dishes.update', $dish->slug) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-2">
                                <label for="name" class="control-label m-1">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $dish->name }}" required>
                                @if ($error_message != '')
                                    <div class="text-danger m-1 ">
                                        {{ $error_message }}
                                    </div>
                                @endif
                                @error('name')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="cover_image" class="m-1">Immagine di copertina</label>
                                <div class="my-1">
                                    @if ($dish->cover_image != null)
                                        <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="Cover Image"
                                            style="max-width: 100px;">
                                    @else
                                        <h5>Immagine di copertina non impostata</h5>
                                    @endif
                                </div>
                                <input type="file"
                                    class="form-control-file my-1 @error('cover_image') is-invalid @enderror"
                                    id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="description" class="m-1">Descrizione</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" required>{{ old('description') ?? $dish->description }}</textarea>
                                @error('description')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="price" class="m-1">Prezzo</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    value="{{ $dish->price }}" required>
                                @error('price')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="visible" name="visible"
                                        value="1" {{ $dish->visible ? 'checked' : '' }}>
                                    <label class="form-check-label m-1" for="visible">Disponibile</label>
                                </div>
                                @error('visible')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <label for="category_id" class="m-1">Categoria del piatto</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id" required>
                                    <option value="">Seleziona una categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $dish->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-light my-2">Salva modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
