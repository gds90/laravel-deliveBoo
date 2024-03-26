@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container p-5">
                <div class="row justify-content-center">
                    <div class="col-12 text-warning mb-4 text-center">
                        <h1>LOGIN</h1>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">Indirizzo
                                e-mail</label>
                            <div>
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

                        <div class="mb-4">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Inserisci la password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        Ricorda credenziali
                                    </label>
                                </div>
                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-black text-decoration-none text-white"
                                            href="{{ route('password.request') }}">
                                            Password dimenticata?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-warning w-50">
                                    ACCEDI
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
