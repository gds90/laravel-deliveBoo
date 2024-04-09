@extends('layouts.app')

@section('content')
    <form id="updateForm" method="POST" action="{{ route('admin.dishes.update', $dish->slug) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container py-5">
            <div class="row justify-content-center">
                <div id="updateForm-errors" class="text-warning open-sans mb-4 d-flex flex-column gap-2"></div>
                <div class="col-12 text-warning mb-4">
                    <h1>Stai modificando il piatto: <span class="open-sans text-white ms-2">{{ $dish->name }}</span></h1>
                    <p class="open-sans fw-semibold text-white">I campi contrassegnati con * sono obbligatori
                    </p>
                </div>

                <div class="col-12 col-md-6 text-white">

                    <div class="form-group">

                        <label for="cover_image" class=" control-label mb-4 open-sans  ">Immagine di copertina: </label>

                        <div class="my-1">
                            @if ($dish->cover_image != null)
                                <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="Cover Image" id="previewImage"
                                    class="d-blog img-fluid mb-3">
                            @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVJ95QK9Z7ppeuEptxKb-QhLhdKkx6XbzuVd90YuJaJavpvQ2qTxDDpkH95m4A3Jbj8&usqp=CAU"
                                    alt="preview" class="img-fluid d-block mb-3" id="previewImage">
                            @endif
                        </div>

                        <input type="file" class="form-control-file my-1 @error('cover_image') is-invalid @enderror"
                            id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="col-12 col-md-6 text-white">

                    <div class="form-group mb-2">
                        <label for="name" class="control-label m-1">Nome: *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $dish->name }}" required>
                        @if ($error_message != '')
                            <div class="text-danger m-1 ">
                                {{ $error_message }}
                            </div>
                        @endif
                        @error('name')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="description" class="m-1">Descrizione: *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3" required>{{ old('description') ?? $dish->description }}</textarea>
                        @error('description')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="price" class="m-1">Prezzo: *</label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                            id="price" name="price" value="{{ $dish->price }}" required>
                        @error('price')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="category_id" class="m-1">Categoria del piatto</label>
                        <select class=" form-select  @error('category_id') is-invalid @enderror" id="category_id"
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

                    <div class="form-group mb-5">
                        <div class="form-check mt-2">
                            <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox"
                                id="visible" name="visible" value="1" {{ $dish->visible ? 'checked' : '' }}>
                            <label class="form-check-label open-sans" for="visible">Disponibile subito?</label>
                        </div>
                        @error('visible')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-warning btn-lg w-50">Modifica</button>
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
