@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 text-warning mb-4">
                <h1>Aggiungi un nuovo piatto</h1>
            </div>
            <div class="col-6 text-white">

                <label for="cover_image" class=" control-label mb-4  ">Immagine di copertina:</label>
                <img src="#" alt="preview" class="img-fluid d-block">

                <div class="form-group my-5 d-flex align-items-end">
                    <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror"
                        id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                    @error('cover_image')
                        <div class="text-danger m-1">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="col-6 text-white">

                <div class="form-group mb-2">
                    <label for="name" class="control-label m-1">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Nome del piatto" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger m-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="description" class="control-label m-1">Descrizione</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Inserisci qui la descrizione del piatto" cols="100" rows="5" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger m-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="price" class="control-label m-1">Prezzo</label>
                    <input type="number" step="0.01" min="0"
                        class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        placeholder="Inserisci il prezzo del piatto" value="{{ old('price') }}"required>
                    @error('price')
                        <div class="text-danger m-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="category_id" class="control-label m-1">Categoria del piatto</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id">
                        <option value="">Seleziona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger m-1">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning-subtle">Inserisci un nuovo piatto nel menù</div>

                    <div class="card-body bg-warning">
                        <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="name" class="control-label m-1">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Nome del piatto" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="cover_image" class="control-label m-1">Immagine di copertina</label>
                                <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror"
                                    id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                                @error('cover_image')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="description" class="control-label m-1">Descrizione</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Inserisci qui la descrizione del piatto" cols="100" rows="5" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="price" class="control-label m-1">Prezzo</label>
                                <input type="number" step="0.01" min="0"
                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                    name="price" placeholder="Inserisci il prezzo del piatto"
                                    value="{{ old('price') }}"required>
                                @error('price')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <label for="category_id" class="control-label m-1">Categoria del piatto</label>
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
                            <div class="form-group my-3">
                                <div class="form-check m-1">
                                    <input class="form-check-input @error('visible') is-invalid @enderror"
                                        type="checkbox" id="visible" name="visible" value="1"
                                        {{ old('visible') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Disponibile subito?</label>
                                </div>
                                @error('visible')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-light">Crea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
