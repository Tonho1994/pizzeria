@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-2 row-cols-md-2 g-4">
        @foreach ($pizzas as $key => $pizza)
            <pizza-component
                :pizza="{{ $pizza }}"
                route-pedido="{{ route('pedidos.create') }}"
            ></pizza-component>
        @endforeach
    </div>
</div>
@endsection
