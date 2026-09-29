@extends('layouts.app')

@section('title', __('Kategória módosítása'))

@section('content')
<h1>{{ __('Kategória módosítása') }}</h1>

  @include('layouts.flash')

  <form action="{{ route('drinktypes.update', $entity->id) }}" method="POST">
      @csrf
      @method('PUT')

      <label for="name">{{ __('Kategória neve') }}</label>
      <input type="text" name="name" id="name" value="{{ old('name', $entity->name) }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">{{ __('Mentés') }}</button>
      <a href="{{ route('drinktypes.index') }}">{{ __('Mégse') }}</a>
  </form>
@endsection