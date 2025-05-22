@extends('client.layouts.app')

@section('title', 'eStore - Home')

@section('body-class', 'index-page')

@section('content')
    @include('client.partials.hero')
    @include('client.partials.info-cards')
    @include('client.partials.category-cards')
    @include('client.partials.best-sellers')
    @include('client.partials.product-list')
</div>
@endsection
