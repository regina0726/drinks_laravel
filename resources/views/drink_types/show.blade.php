@extends('layouts.app')
  @section('title', __('Kategória megtekintése'))
  @section('content')

  <h1>{{ $entity->name }}</h1>

  <p>ID: {{ $entity->id }}</p>
  <p>Név: {{ $entity->name }}</p>

  <h2>{{ __('Márkák') }}</h2>
  @if($entity->brands->isEmpty())
    <p>{{ __('Nincs márka ebben a ketgóriában.') }}</p>
  @else
    <ul>
      @foreach($entity->brands as $brand)
        <li>
          {{ $brand->name }}
        </li>
      @endforeach
    </ul>
  @endif

  <a href="{{ route('drinktypes.index') }}">
    {{ __('Vissza a listához') }}
  </a>

  @endsection