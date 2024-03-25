@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <div class="col-12 col-md-5 text-center">
                @if ($dish->cover_image)
                    <img src="{{ asset('/storage/' . $dish->cover_image) }}" class="img-fluid" alt="{{ $dish->name }}">
                @else
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVJ95QK9Z7ppeuEptxKb-QhLhdKkx6XbzuVd90YuJaJavpvQ2qTxDDpkH95m4A3Jbj8&usqp=CAU"
                        alt="{{ $dish->name }}" class="img-fluid">
                @endif
            </div>

            <div class="col-12 col-md-7">

                <div class="dish-top-content">
                    <div class="title d-flex justify-content-between align-items-center ">
                        <h2>{{ $dish->name }}</h2>
                        <strong>&euro; {{ $dish->price }}</strong>
                    </div>
                    <p class="c-gray fw-semibold ">{{ $dish->category->name }}</p>
                </div>

                <div class="dish-bottom-content">
                    <p>{{ $dish->description }}</p>

                    <div class="dish-btn-container">
                        <a class="btn" href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}"><i
                                class="fa-solid fa-edit"></i></a>
                        <a href="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" class="btn"
                            data-bs-toggle="modal" data-bs-target="#modal_post_delete-{{ $dish->slug }}">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        @include('admin.dishes.partials.modal_delete')
                    </div>
                </div>

            </div>

        </div>
    @endsection
