@extends('dashboard')

@section('dashboard_content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="content d-flex align-items-center">
                    <a class="btn btn-outline-warning fw-bold m-3" href="{{ Route('admin.dishes.create') }}" role="button"><i
                            class="fa-solid fa-plus"></i></a>
                    <div class="text-warning ">Aggiungi un nuovo piatto</div>

                </div>
            </div>
            @foreach ($dishes as $dish)
                <div class="col-12 col-md-4">
                    <div class="dishes-card mb-2 mb-md-5">
                        <div class="img-container">
                            @if ($dish->cover_image)
                                <img src="{{ asset('/storage/' . $dish->cover_image) }}" class="card-img-top"
                                    alt="{{ $dish->name }}">
                            @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVJ95QK9Z7ppeuEptxKb-QhLhdKkx6XbzuVd90YuJaJavpvQ2qTxDDpkH95m4A3Jbj8&usqp=CAU"
                                    alt="placeholder" class="card-img-top">
                            @endif
                            <div class="overlay d-flex justify-content-center align-items-center gap-3">
                                <a href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}" class="dish-btn"><i
                                        class="fas fa-eye"></i></a>
                                <a class="dish-btn" href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}"><i
                                        class="fa-solid fa-edit"></i></a>
                                <a href="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" class="dish-btn"
                                    data-bs-toggle="modal" data-bs-target="#modal_post_delete-{{ $dish->slug }}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                @include('admin.dishes.partials.modal_delete')
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title fs-4 text-start mb-1">
                                {{ $dish->name }}

                                @if ($dish->visible)
                                    <i class="fas fa-eye ms-2"></i>
                                @else
                                    <i class="fas fa-eye-slash ms-2"></i>
                                @endif

                            </h4>
                            @if ($dish->category)
                                <p class="card-text c-gray fw-semibold d-flex justify-content-between fs-6">
                                    <span>{{ $dish->category->name }}</span>
                                    <span class="">&euro; {{ $dish->price }}</span>
                                </p>
                            @else
                                <p class="card-text c-gray fw-semibold">No Category</p>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <table class="table">
                    <thead>
                        <tr class="">
                            <th scope="col" class="fw-light fs-5">#</th>
                            <th scope="col" class="fw-light fs-5">Nome</th>
                            <th scope="col" class="fw-light fs-5">Descrizione</th>
                            <th scope="col" class="fw-light fs-5">Prezzo</th>
                            <th scope="col" class="fw-light fs-5">Immagine di Copertina</th>
                            <th scope="col" class="fw-light fs-5">Categoria</th>
                            <th scope="col" class="fw-light fs-5">Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                            <div class="card">
                                <img src="{{ asset('/storage/' . $dish->cover_image) }}" class="card-img-top"
                                    alt="{{ $dish->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $dish->name }}</h4>
                                    @if ($dish->category)
                                        <p class="card-text">{{ $dish->category->name }}</p>
                                    @endif
                                    <p class="card-text">{{ $dish->description }}</p>
                                    <p class="card-text">&euro; {{ $dish->price }}</p>
                                </div>
                            </div>

                            <tr>
                                <th scope="row">{{ $dish->id }}</th>
                                <td></td>
                                <td></td>
                                <td>{{ $dish->description }}</td>
                                <td>{{ $dish->cover_image }}</td>
                                <td>

                                </td>
                                <td>
                                    <div class="button-container d-flex">
                                        <a href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}"
                                            class="btn btn-primary m-2"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning  m-2"
                                            href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}"><i
                                                class="fa-solid fa-edit"></i></a>
                                        {{-- <form class=" m-2"
                                            action="{{ route('admin.dishes.destroy', ['dish' => $dish['slug']]) }}"
                                            method="POST"
                                            onsubmit="return confirm('sei sicuro di voler eliminare il piatto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>

                                        <a href="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}"
                                            class="btn btn-sm btn-outline-danger m-2 px-2" data-bs-toggle="modal"
                                            data-bs-target="#modal_post_delete-{{ $dish->slug }}">
                                            <i class="fa-solid fa-trash px-1 mt-2"></i>
                                        </a>

                                        @include('admin.dishes.partials.modal_delete')
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
        </div>
    </div>
@endsection
