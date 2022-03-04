@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form class="row g-3" method="POST" action="{{ route('pedidos.confirm') }}" novalidate>
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Confirm your name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">{{ __('Confirm your Email Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="{{ $user->email }}">
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                        placeholder="{{ __('Main Street #12 Sate California C.P. 00000') }}" value="{{ old('address') }}">
                        @error('address')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>
                @if ($errors->has('seleccion'))
                    <div class="col-12">
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{__($errors->first('seleccion'))}}</strong>
                        </span>
                    </div>
                @endif
                @foreach ($pizzas as $pizza)
                    <div class="col">
                        <label for="{{ $pizza->name }}" class="form-label">{{ $pizza->name }} </label>
                        <select id="{{ $pizza->name }}" name="{{ $pizza->name }}" class="form-select @error($pizza->name) is-invalid @enderror">
                            <option value="0">{{ __('Quantity...') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @error($pizza->name)
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endforeach

                <div class="col-12">
                    <button type="submit" class="btn btn-primary text-white">{{ __('Order') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
