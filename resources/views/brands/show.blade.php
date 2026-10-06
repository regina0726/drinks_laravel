@extends('layouts.app')

@section('title', __('Márka megtekintése'))

@section('content')
<h1>{{ $brand->name }}</h1>

<p>ID: {{ $brand->id }}</p>
<p>{{ __('Név') }}: {{ $brand->name }}</p>
<p>{{ __('Alkoholtartalom') }}: {{ $brand->alcohol_percent }}%</p>
<p>
    {{ __('Kategória') }}:
    @if($brand->drinktype)
        <a href="{{ route('drinktypes.show', $brand->drinktype) }}">{{ $brand->drinktype->name }}</a>
    @else
        -
    @endif
</p>

<a href="{{ route('brands.index') }}">{{ __('Vissza a listához') }}</a>
@endsection
