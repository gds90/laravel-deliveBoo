@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 p-4 bg-gradient ">
                <div class="bg_gradient p-4 rounded-3 shadow">
                    <h2 class="fs-4 text_blue_primary py-2 text-center">
                        Dashboard ristoratore
                    </h2>

                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="text_blue_primary">
                            <a href="{{ route('admin.dishes.index') }}"
                                class="text-decoration-none text-reset btn btn-light p-3 w-100"><i
                                    class="fa-solid fa-pizza-slice me-2"></i>
                                Visualizza i tuoi piatti
                            </a>
                        </div>
                        {{-- <div>
                        <a href="{{ route('admin.restaurants.index') }}">Restaurants</a>
                    </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-9 text-warning text-center pt-3">
                @if (Route::currentRouteName() == 'admin.dashboard')
                    <h2 class="pt-4 fs-1">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-2">Scegli un'opzione dal menù<span>
                    </h2>
                @endif
                @yield('dashboard_content')
            </div>
        @endsection
