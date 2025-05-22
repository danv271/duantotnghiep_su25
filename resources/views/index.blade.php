@extends('layouts.app')

@section('title', 'eStore - Home')

@section('body-class', 'index-page')

@section('content')
    @include('partials.hero')
    @include('partials.info-cards')
    @include('partials.category-cards')
    @include('partials.best-sellers')
    @include('partials.product-list')

    </div>
@endsection
