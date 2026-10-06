@extends('layouts.app')

@section('title', __('Kategória megtekintése'))

@section('content')
<h1>{{ $drinktype->name }}</h1>

<p>ID: {{ $drinktype->id }}</p>
<p>{{ __('Név') }}: {{ $drinktype->name }}</p>

<h2>{{ __('Márkák') }}</h2>
@if($drinktype->brands->isEmpty())
    <p>{{ __('Nincs márka ebben a kategóriában.') }}</p>
@else
    <ul>
        @foreach($drinktype->brands as $brand)
            <li>
                <a href="{{ route('brands.show', $brand) }}">{{ $brand->name }}</a>
                ({{ $brand->alcohol_percent }}%)
            </li>
        @endforeach
    </ul>
@endif

<a href="{{ route('drinktypes.index') }}">{{ __('Vissza a listához') }}</a>
@endsection
