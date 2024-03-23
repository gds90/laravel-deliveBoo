@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crea un nuovo elemento</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Nome del piatto" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cover_image">Immagine di copertina</label>
                                <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror"
                                    id="cover_image" name="cover_image" value="{{ old('cover_image') }}" required>
                                @error('cover_image')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Inserisci qui la descrizione del progetto" cols="100" rows="10" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    placeholder="Inserisci il prezzo del piatto" value="{{ old('price') }}"required>
                                @error('price')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox"
                                        id="visible" name="visible" value="1" {{ old('visible') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Visibile</label>
                                </div>
                                @error('visible')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Categoria del piatto</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id">
                                    <option value="">Seleziona una categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Crea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
