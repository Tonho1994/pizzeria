
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-2 row-cols-md-2 g-4">
        {{ $pizza->name }}
    </div>
</div>
@endsection
