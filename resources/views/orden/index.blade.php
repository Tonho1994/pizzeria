@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form class="row g-3">
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Confirm your name') }}</label>
                    <input type="text" class="form-control" id="name" placeholder="{{ $user->name }}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">{{ __('Confirm your Email Address') }}</label>
                    <input type="email" class="form-control" id="email" placeholder="{{ $user->email }}">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control" id="address"
                        placeholder="{{ __('Main Street #12 Sate California C.P. 00000') }}">
                </div>
                @foreach ($pizzas as $pizza)
                    <div class="col-md-4">
                        <label for="{{ $pizza->name }}" class="form-label">{{ $pizza->name }} </label>
                        <select id="$pizza->name " class="form-select">
                            <option selected>{{ __('Quantity...') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                        </select>
                    </div>
                @endforeach

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ __('Order') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
