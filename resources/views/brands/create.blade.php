@extends('layouts.app')

@section('title', __('Új márka hozzáadása'))

@section('content')
<h1>{{ __('Új márka') }}</h1>

@include('components.flash')

<form action="{{ route('brands.store') }}" method="POST">
    @csrf

    <label for="name">{{ __('Márka neve') }}</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="alcohol_percent">{{ __('Alkoholtartalom (%)') }}</label>
    <input type="number" name="alcohol_percent" id="alcohol_percent" step="0.1" min="0" max="100"
           value="{{ old('alcohol_percent') }}" required>
    @error('alcohol_percent')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="drinktype_id">{{ __('Kategória') }}</label>
    <select name="drinktype_id" id="drinktype_id" required>
        <option value="">{{ __('-- Válassz --') }}</option>
        @foreach($drinktypes as $drinktype)
            <option value="{{ $drinktype->id }}" @selected(old('drinktype_id') == $drinktype->id)>
                {{ $drinktype->name }}
            </option>
        @endforeach
    </select>
    @error('drinktype_id')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">{{ __('Mentés') }}</button>
    <a href="{{ route('brands.index') }}">{{ __('Mégse') }}</a>
</form>
@endsection
