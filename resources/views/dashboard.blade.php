@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 p-4 bg-gradient d-none d-md-block">
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
            <div class="col-10 m-auto col-md-9 text-warning text-center pt-3">
                @if (Route::currentRouteName() == 'admin.dashboard')
                    <h2 class="pt-4 fs-1">
                        <i class="fa-solid fa-arrow-left d-none d-md-inline"></i>
                        <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample"
                            class="d-inline d-md-none text-decoration-underline text-warning"><span class="ms-2">Scegli
                                un'opzione dal menù<span></a>
                        <span class="ms-2 d-none d-md-inline">Scegli un'opzione dal menù<span>
                    </h2>

                    <div class="offcanvas offcanvas-start bg_gradient" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title text_blue_primary" id="offcanvasExampleLabel">Dashboard Ristoratore
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="text_blue_primary">
                                <a href="{{ route('admin.dishes.index') }}"
                                    class="text-decoration-none text-reset btn btn-light p-3 w-100"><i
                                        class="fa-solid fa-pizza-slice me-2"></i>
                                    Visualizza i tuoi piatti
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @yield('dashboard_content')
            </div>
        @endsection
