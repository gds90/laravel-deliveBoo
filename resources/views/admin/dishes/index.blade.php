@extends('dashboard')

@section('dashboard_content')
    <div class="container py-3">
        <div class="row">

            @if ($dishes->count() > 0)
                <div class="col-12 mb-3">
                    @if (session('error_message'))
                        <div class="d-flex justify-content-center ">
                            <h4 class="text-warning">{{ session('error_message') }}</h4>
                        </div>
                    @endif
                    <div class="content d-flex align-items-center fs-3">
                        <a class="btn btn-outline-warning fw-bold m-3" href="{{ Route('admin.dishes.create') }}"
                            role="button"><i class="fa-solid fa-plus"></i></a>
                        <div class="text-warning">Aggiungi un nuovo piatto</div>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <table class="table table-warning roundedTable">
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
                                <tr class="open-sans">
                                    <th class="text-secondary-emphasis ">{{ $dish->id }}</th>
                                    <td class="text-secondary-emphasis fw-bold ">{{ $dish->name }}</td>
                                    <td class="text-secondary-emphasis ">{{ $dish->description }}</td>
                                    <td class="text-secondary-emphasis ">{{ $dish->price }}€</td>
                                    <td>
                                        @if ($dish->cover_image)
                                            <img src="/storage/{{ $dish->cover_image }}" class="w-50 img-fluid"></img>
                                        @else
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVJ95QK9Z7ppeuEptxKb-QhLhdKkx6XbzuVd90YuJaJavpvQ2qTxDDpkH95m4A3Jbj8&usqp=CAU"
                                                alt="{{ $dish->name }}" class="img-fluid w-50">
                                        @endif
                                    </td>
                                    <td class="text-secondary-emphasis ">
                                        @if ($dish->category)
                                            {{ $dish->category->name }}
                                        @else
                                            Non definita
                                        @endif
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
                                        </form> --}}

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
                    </table>
                </div>
            @else
                <div class="col-12 p-5">
                    @if (session('error_message'))
                        <div class="d-flex justify-content-center ">
                            <h4 class="text-warning">{{ session('error_message') }}</h4>
                        </div>
                    @endif
                    <div class="content d-flex align-items-center justify-content-center">
                        <div class="text-white fs-1 fw-bold">Aggiungi il tuo primo piatto</div>
                        <a class="btn btn-outline-warning fw-bold m-3" href="{{ Route('admin.dishes.create') }}"
                            role="button"><i class="fa-solid fa-plus"></i></a>

                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
