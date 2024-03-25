@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="container p-5">
            <div class="row justify-content-center">

                <div class="col-12 text-warning mb-4">
                    <h1>Registrazione</h1>
                </div>

                <div class="col-12 col-md-6 text-white">
                    <strong class="open-sans fs-5">Inserisci i tuoi dati personali:</strong>

                    <div class="mb-4 mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome e cognome:</label>

                        <div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Inserisci nome e cognome">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo
                            e-mail:</label>

                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Inserisci il tuo indirizzo e-mail">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Inserisci la password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Conferma password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Conferma la password">
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6 text-white">
                    <strong class="open-sans fs-5">Inserisci i dati del Ristorante:</strong>

                    <div class="mb-4 mt-3">
                        <label for="restaurantName" class="col-md-4 col-form-label text-md-right">Nome
                            ristorante:</label>

                        <div>
                            <input id="restaurantName" type="text" class="form-control" name="restaurantName"
                                value="{{ old('restaurantName') }}" required autocomplete="name" autofocus
                                placeholder="Inserisci il nome della tua attività">
                        </div>
                        @error('restaurantName')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita IVA:</label>

                        <div>
                            <input id="p_iva" type="text" class="form-control" name="p_iva"
                                value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus
                                placeholder="Inserisci la tua partita IVA">
                        </div>
                        @error('p_iva')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo:</label>

                        <div>
                            <input id="address" type="text" class="form-control" name="address"
                                value="{{ old('address') }}" required autocomplete="address" autofocus
                                placeholder="Inserisci l'indirizzo della tua attività">
                        </div>
                        @error('address')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cover_image" class="col-md-4 col-form-label text-md-right">Immagine di
                            copertina:</label>

                        <div>
                            <input type="file" name="cover_image" id="cover_image" class="form-control">
                        </div>
                        @error('cover_image')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-12 col-md-6 d-flex align-items-end">
                    <div class="w-100">
                        <button type="submit" class="btn btn-lg btn-outline-warning w-100">
                            Registrati
                        </button>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <label for="accordionExample" class=" form-label text-white ">Aggiungi il tipo di attività: </label>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Scegli il tipo di attività
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body d-flex flex-wrap gap-2">
                                    @foreach ($types as $type)
                                        <div class="col-3">
                                            <input type="checkbox" class="form-check-input" name="type[]"
                                                id="type-{{ $type->id }}" value="{{ $type->id }}"
                                                {{ in_array($type->id, old('type', [])) ? 'checked' : '' }}>
                                            <label for="type-{{ $type->id }}"
                                                class=" form-check-label open-sans fw-semibold ms-2">{{ $type->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {{-- <div class="col-md-8">
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
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        Registrati
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
            </div>
        </div>
    </form>
@endsection
