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
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $dish->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="cover_image">Immagine di copertina</label>
                                <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                                @if ($dish->cover_image != null)
                                    <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="Cover Image"
                                        style="max-width: 100px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $dish->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    value="{{ $dish->price }}" required>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="visible" name="visible"
                                        {{ $dish->visible ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Visibile</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Categoria del piatto</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $dish->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Salva modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
