@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function submitCreateForm(){
        event.preventDefault();
        var data = new FormData(document.getElementById("formCreate"));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/pedidos',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'json'
        }).done(function (response) {
            Swal.fire('Exito!',data.responseText,'success');
/*             location.href='/' */
            setTimeout("location.href='/'",3000)
        }).fail(function(data) {
            Swal.fire('¡Upss!',data.responseText,'warning');
        });
    }

</script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form id="formCreate" name="formCreate" class="row g-3" onsubmit="submitCreateForm()" novalidate>
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
                <input id="quantity" name="quantity" type="hidden" value="{{ $total }}">
                <input id="total" name="total" type="hidden" value="{{ ($total*.21)+$total}}">
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
                    <tr>
                        <th scope="row" colspan="2">%IVA</th>
                        <td>{{ ($total*.21)+$total}}</td>
                    </tr>
                </tbody>
            </table>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary text-white">{{ __('Confirm purchase') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
