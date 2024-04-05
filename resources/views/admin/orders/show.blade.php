@extends('dashboard')

@section('dashboard_content')
    <div class="container py-4 px-2">
        <div class="row">
            <h2 class="my-3 text-uppercase ">Ordine n° {{ $order->id }}</h2>
            <div class="col-12 col-md-5 text-start p-4 text-white open-sans order-sm-1">
                <h4 class="mb-3">Dati ordine:</h4>
                <p><strong>Nome cliente: </strong> {{ $order->name }}</p>
                <p><strong>Cognome cliente: </strong> {{ $order->surname }}</p>
                <p><strong>Telefono cliente: </strong> {{ $order->phone }}</p>
                <p><strong>Indirizzo di consegna: </strong>{{ $order->delivery_address }}</p>
                <p><strong>Data e ora: </strong>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-y - H:i') }}</p>
                <p><strong>Totale: </strong>{{ $order->price }}€</p>
                <p><strong>Stato: </strong>{{ $order->status }}</p>
            </div>

            <div class="col-12 col-md-7 p-4 text-white open-sans text-start order-sm-0">

                {{-- <div class="card shadow">
                    <ul class="list-unstyled indi-flowers">
                        @foreach ($order->dishes as $dish)
                            <li>{{ $dish->name }} x{{ $dish->pivot->quantity }}</li>
                        @endforeach
                    </ul>
                </div> --}}




                <div class="receipt ">

                    <div id="receiptWrapper" class="receiptWrapper indi-flowers text-black">
                        <div class="receipt zig-zag zig-zag-top zig-zag-bottom">
                            <div class="receiptHeader">
                                <img src="/img/logo.png" alt="" class="w-25" />
                                <img src="/img/logo_text.png" alt="" class="w-25" />
                            </div>
                            <div class="receiptBody mt-2">
                                <div class="receiptRestaurantName text-center fs-2 fw-bold">
                                    {{ $order->restaurant->name }}
                                </div>
                                <div class="receiptItem text-start m-4">
                                    <ul class="list-unstyled indi-flowers ">
                                        @foreach ($order->dishes as $dish)
                                            <li>{{ $dish->name }} x{{ $dish->pivot->quantity }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="receiptFooter"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
