@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-2 row-cols-md-2 g-4">
        @foreach ($pizzas as $key => $pizza)
            <div class="col">
                <div class="card">
                    <img src="{{ asset("img/pizzas/$pizza->foto") }}" class="card-img-top figure-img img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pizza->name }}</h5>
                        <p class="card-text">{{ $pizza->ingredients }}.</p>
                        <p class="card-text"><small class="text-muted">${{ $pizza->price }}</small></p>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Ordenar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
