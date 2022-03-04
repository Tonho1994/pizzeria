@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-danger text-white">{{ __('Orders') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Address') }}</th>
                                <th scope="col">{{ __('Quantity') }}</th>
                                <th scope="col">{{ __('Total') }}</th>
                                <th scope="col">{{ __('Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                            <tr>
                                <th scope="row">
                                    {{ $pedido->id }}
                                </th>
                                <th scope="row">
                                    {{ $pedido->address }}
                                </th>
                                <th scope="row">
                                    {{ $pedido->quantity }}
                                </th>
                                <th scope="row">
                                    {{ $pedido->total }}
                                </th>
                                <th scope="row">
                                    {{ $pedido->created_at }}
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
