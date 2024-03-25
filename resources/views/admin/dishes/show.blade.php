@extends('dashboard')

@section('dashboard_content')
    <div class="container py-4 px-2">
        <div class="row">

            <div class="col-12 col-md-5 text-center">
                @if ($dish->cover_image)
                    <img src="{{ asset('/storage/' . $dish->cover_image) }}"
                        class="img-fluid rounded-2 border-warning border-5" alt="{{ $dish->name }}">
                @else
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVJ95QK9Z7ppeuEptxKb-QhLhdKkx6XbzuVd90YuJaJavpvQ2qTxDDpkH95m4A3Jbj8&usqp=CAU"
                        alt="{{ $dish->name }}" class="img-fluid">
                @endif
            </div>

            <div class="col-12 col-md-7">

                <div class="dish-top-content text-start">
                    <div class="title d-flex justify-content-between align-items-center ">
                        <h2>{{ $dish->name }}</h2>
                        <strong class="fs-5">&euro; {{ $dish->price }}</strong>
                    </div>
                    <p class="c-gray fw-semibold ">{{ $dish->category->name }}</p>
                </div>

                <div class="dish-bottom-content">
                    <p class="text-white">{{ $dish->description }}</p>

                    <div class="dish-btn-container d-flex gap-2 justify-content-center">
                        <a class="btn edit-btn"
                            href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}">MODIFICA</a>
                        <a href="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" class="btn delete-btn"
                            data-bs-toggle="modal" data-bs-target="#modal_post_delete-{{ $dish->slug }}">
                            CANCELLA
                        </a>
                        @include('admin.dishes.partials.modal_delete')
                    </div>
                </div>

            </div>

        </div>
    @endsection
