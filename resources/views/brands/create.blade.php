@extends('layouts.app')

@section('title', __('Új márka hozzáadása'))

@section('content')
<h1>{{ __('Új márka') }}</h1>

  @include('layouts.flash')

  <form action="{{ route('brands.store') }}" method="POST">
      @csrf

      <label for="name">{{ __('Márka neve') }}</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">{{ __('Mentés') }}</button>
      <a href="{{ route('brands.index') }}">{{ __('Mégse') }}</a>
  </form>
@endsection