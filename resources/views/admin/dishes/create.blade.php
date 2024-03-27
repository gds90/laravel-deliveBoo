@extends('layouts.app')

@section('content')
    <form id="storeForm" method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="container py-5">
            <div class="row justify-content-center">
                <div id="storeForm-errors" class="text-warning open-sans mb-4 d-flex flex-column gap-2"></div>
                <div class="col-12 text-warning mb-4">
                    <h1>Aggiungi un nuovo piatto</h1>
                    <p class="open-sans fw-semibold text-white">I campi contrassegnati con * sono obbligatori
                    </p>
                </div>
                <div class="col-6 text-white">

                    <label for="cover_image" class=" control-label mb-4 open-sans  ">Immagine di copertina:</label>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVJ95QK9Z7ppeuEptxKb-QhLhdKkx6XbzuVd90YuJaJavpvQ2qTxDDpkH95m4A3Jbj8&usqp=CAU"
                        alt="preview" class="img-fluid d-block" id="previewImage">

                    <div class="form-group my-5 d-flex align-items-end">
                        <input type="file" class="open-sans form-control-file @error('cover_image') is-invalid @enderror"
                            id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                        @error('cover_image')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="col-6 text-white">

                    <div class="form-group mb-2">
                        <label for="name" class="control-label m-1 open-sans">Nome: *</label>
                        <input type="text" class="open-sans form-control @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="Nome del piatto" value="{{ old('name') }}"
                            required>
                        @error('name')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="description" class="control-label m-1 open-sans">Descrizione: *</label>
                        <textarea name="description" id="description" class="open-sans form-control @error('description') is-invalid @enderror"
                            placeholder="Inserisci qui la descrizione del piatto" cols="100" rows="5" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="price" class="control-label m-1 open-sans">Prezzo: *</label>
                        <input type="number" step="0.01" min="0"
                            class="open-sans form-control @error('price') is-invalid @enderror" id="price"
                            name="price" placeholder="Inserisci il prezzo del piatto" value="{{ old('price') }}"required>
                        @error('price')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="category_id" class="control-label m-1 open-sans">Categoria del piatto:</label>
                        <select class="open-sans form-select @error('category_id') is-invalid @enderror" id="category_id"
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

                    <div class="form-group mb-3">
                        <div class="form-check mt-2">
                            <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox"
                                id="visible" name="visible" value="1" {{ old('visible') ? 'checked' : '' }} checked>
                            <label class="form-check-label open-sans" for="visible">Disponibile subito?</label>
                        </div>
                        @error('visible')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-warning btn-lg w-50">Crea</button>
                    </div>

                </div>
            </div>
        </div>

    </form>

    <script>
        document.getElementById("cover_image").addEventListener("change", function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('previewImage');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endsection
