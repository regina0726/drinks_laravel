@extends('layouts.app')

@section('title', __('Új kategória létrehozása'))

@section('content')
<h1>{{ __('Új kategória') }}</h1>

@include('components.flash')

<form action="{{ route('drinktypes.store') }}" method="POST">
    @csrf

    <label for="name">{{ __('Kategória neve') }}</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">{{ __('Mentés') }}</button>
    <a href="{{ route('drinktypes.index') }}">{{ __('Mégse') }}</a>
</form>
@endsection
