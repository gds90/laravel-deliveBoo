@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica elemento</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.dishes.update', $dish->slug) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome</label>
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
                            <div class="form-group">
                                <label for="cover_image">Immagine di copertina</label>
                                @if ($dish->cover_image != null)
                                    <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="Cover Image"
                                        style="max-width: 100px;">
                                @else
                                    <h5>Immagine di copertina non impostata</h5>
                                @endif
                                <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror"
                                    id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" required>{{ old('description') ?? $dish->description }}</textarea>
                                @error('description')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    value="{{ $dish->price }}" required>
                                @error('price')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="visible" name="visible"
                                        value="1" {{ $dish->visible ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Visibile</label>
                                </div>
                                @error('visible')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Categoria del piatto</label>
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

                            <button type="submit" class="btn btn-primary">Salva modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
