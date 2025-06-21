{{-- resources/views/products.blade.php --}}
@extends('layouts.app')

@section('content')
    @include('partials.product-list', ['products' => $products])
@endsection
