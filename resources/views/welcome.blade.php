@extends('layouts.app')

@section('title', __('Italok'))

@section('content')
<div class="myDiv">
    <h1>{{ __('Italok') }}</h1>
    <p>
        <a href="{{ route('drinktypes.index') }}">{{ __('Ital kategóriák megtekintése') }}</a>
        |
        <a href="{{ route('brands.index') }}">{{ __('Márkák megtekintése') }}</a>
    </p>
</div>
@endsection
