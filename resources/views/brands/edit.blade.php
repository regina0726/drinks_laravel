@extends('layouts.app')

@section('title', __('Márka módosítása'))

@section('content')
<h1>{{ __('Márka módosítása') }}</h1>

  @include('layouts.flash')

  <form action="{{ route('brands.update', $entity->id) }}" method="POST">
      @csrf
      @method('PUT')

      <label for="name">{{ __('Márka neve') }}</label>
      <input type="text" name="name" id="name" value="{{ old('name', $entity->name) }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">{{ __('Mentés') }}</button>
      <a href="{{ route('brands.index') }}">{{ __('Mégse') }}</a>
  </form>
@endsection