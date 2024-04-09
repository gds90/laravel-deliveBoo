@extends('dashboard')

@section('dashboard_content')
    <div class="container py-3">
        <div class="row">

            @if ($orders->count() > 0)
                <div class="col-12 mb-3">
                    @if (session('error_message'))
                        <div class="d-flex justify-content-center ">
                            <h4 class="text-warning">{{ session('error_message') }}</h4>
                        </div>
                    @endif
                    <div class="content d-flex align-items-center fs-3">
                        {{-- <a class="btn btna-outline-warning fw-bold m-3" href="{{ Route('admin.orders.create') }}"
                            role="button"><i class="fa-solid fa-plus"></i></a> --}}
                        <div class="text-warning">Ordini ricevuti</div>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <table class="table table-warning roundedTable">
                        <thead>
                            <tr class="">
                                {{-- <th scope="col" class="fw-light fs-5">#</th> --}}
                                <th scope="col" class="fw-light fs-5">Nome</th>
                                <th scope="col" class="fw-light fs-5">Cognome</th>
                                <th scope="col" class="fw-light fs-5">Indirizzo</th>
                                <th scope="col" class="fw-light fs-5 d-lg-table-cell d-none">Telefono</th>
                                <th scope="col" class="fw-light fs-5">Totale €</th>
                                <th scope="col" class="fw-light fs-5 d-lg-table-cell d-none">Data e ora</th>
                                <th scope="col" class="fw-light fs-5">Stato</th>
                                <th scope="col" class="fw-light fs-5">Dettaglio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="open-sans">
                                    {{-- <th class="text-secondary-emphasis ">{{ $order->id }}</th> --}}
                                    <td class="text-secondary-emphasis fw-bold pt-3">{{ $order->name }}</td>
                                    <td class="text-secondary-emphasis pt-3">{{ $order->surname }}</td>
                                    <td class="text-secondary-emphasis pt-3">{{ $order->delivery_address }}</td>
                                    <td class="text-secondary-emphasis pt-3 d-lg-table-cell d-none">
                                        @if ($order->phone)
                                            {{ $order->phone }}
                                        @else
                                            Non definito
                                        @endif
                                    </td>
                                    <td class="text-secondary-emphasis pt-3">{{ $order->price }}€</td>
                                    <td class="text-secondary-emphasis pt-3 d-lg-table-cell d-none">
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-y - H:i') }}</td>
                                    <td class="text-secondary-emphasis pt-2">
                                        <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select id="status" name="status" class="form-select"
                                                onchange="this.form.submit()">
                                                <option value="in lavorazione"
                                                    {{ $order->status === 'in lavorazione' ? 'selected' : '' }}>In
                                                    lavorazione</option>
                                                <option value="in consegna"
                                                    {{ $order->status === 'in consegna' ? 'selected' : '' }}>In consegna
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="text-secondary-emphasis p-3"><a
                                            href="{{ route('admin.orders.show', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a></td>
                                    {{-- <td>
                                        <div class="button-container d-flex">
                                            <a href="{{ route('admin.orders.show', ['order' => $order->slug]) }}"
                                                class="btn btn-primary m-2"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-warning  m-2"
                                                href="{{ route('admin.orders.edit', ['order' => $order->slug]) }}"><i
                                                    class="fa-solid fa-edit"></i></a>
                                            {{-- <form class=" m-2"
                                            action="{{ route('admin.orders.destroy', ['order' => $order['slug']]) }}"
                                            method="POST"
                                            onsubmit="return confirm('sei sicuro di voler eliminare il piatto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form> 

                                         <a href="{{ route('admin.orders.destroy', ['order' => $order->id]) }}"
                                                class="btn btn-sm btn-outline-danger m-2 px-2" data-bs-toggle="modal"
                                                data-bs-target="#modal_post_delete-{{ $order->slug }}">
                                                <i class="fa-solid fa-trash px-1 mt-2"></i>
                                            </a>

                                            @include('admin.orders.partials.modal_delete')
                                        </div>
                                    </td> --}}

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
                        <div class="text-white fs-1 fw-bold">Non hai nessun ordine</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
