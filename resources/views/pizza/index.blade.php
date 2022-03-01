
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7 mx-auto">
            <div class="row">
                <pizza-component
                    :pizza="{{ $pizza }}"
                    route-pedido="{{ route('pedidos.create') }}"
                ></pizza-component>
            </div>
        </div>
    </div>
</div>
@endsection
