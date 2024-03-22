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
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="cover_image">Immagine di copertina</label>
                                <input type="file" class="form-control-file" id="cover_image" name="cover_image"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    required>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="visible" name="visible">
                                    <label class="form-check-label" for="visible">Visibile</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Categoria del piatto</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="">Seleziona una categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Crea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
