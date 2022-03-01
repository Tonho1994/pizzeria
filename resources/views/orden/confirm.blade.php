@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form id="formCreate" name="formCreate" class="row g-3" novalidate>
                @csrf
                <div class="col-6">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control " id="name" name="name" value="{{ $data['name'] }}" readonly>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label">{{ __('Email Address') }}</label>
                    <input type="text" class="form-control " id="email" name="email" value="{{ $data['email'] }}" readonly>
                </div>
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control " id="address" name="address" value="{{ $data['address'] }}" readonly>
                </div>
                {{-- @foreach ($pizzas as $pizza)
                {{ $pizza->name }}
            @endforeach --}}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Quantity') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pizzas as $pizza)
                    <tr>
                        <th scope="row">
                            @if ('Hawaiana'==$pizza->name)
                                {{ $data['Hawaiana'] }}
                            @elseif ('Mexicana'==$pizza->name)
                                {{ $data['Mexicana'] }}
                            @elseif ('CuatroQuesos'==$pizza->name)
                                {{ $data['CuatroQuesos'] }}
                            @elseif ('Margarita'==$pizza->name)
                                {{ $data['Margarita'] }}
                            @else

                            @endif
                        </th>
                        <td>{{ $pizza->name }}</td>
                        <td>{{ $pizza->price }}</td>
                    </tr>
                    @endforeach

                    <tr>
                        <th scope="row" colspan="2">Total</th>
                        <td>{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ __('Confirm purchase') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
