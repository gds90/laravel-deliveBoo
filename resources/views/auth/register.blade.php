@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning-subtle">Registrazione</div>

                    <div class="card-body bg-warning">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome e cognome:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Inserisci nome e cognome">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo
                                    e-mail:</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Inserisci il tuo indirizzo e-mail">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Inserisci la password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Conferma la password">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="restaurantName" class="col-md-4 col-form-label text-md-right">Nome
                                    ristorante:</label>

                                <div class="col-md-6">
                                    <input id="restaurantName" type="text" class="form-control" name="restaurantName"
                                        value="{{ old('restaurantName') }}" required autocomplete="name" autofocus
                                        placeholder="Inserisci il nome della tua attività">
                                </div>
                                @error('restaurantName')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row">
                                <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita IVA:</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text" class="form-control" name="p_iva"
                                        value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus
                                        placeholder="Inserisci la tua partita IVA">
                                </div>
                                @error('p_iva')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo:</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address"
                                value="{{ old('address') }}" required autocomplete="address" autofocus
                                placeholder="Inserisci l'indirizzo della tua attività">
                        </div>
                        @error('address')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 row">
                        <label for="cover_image" class="col-md-4 col-form-label text-md-right">Immagine di
                            copertina:</label>

                        <div class="col-md-6">
                            <input type="file" name="cover_image" id="cover_image" class="form-control">
                        </div>
                        @error('cover_image')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2 row mb-0 justify-content-start ">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-warning">
                                Registrati
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
