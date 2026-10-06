@extends('layouts.app')

@section('title', __('Márkák'))

@section('content')
<h1>{{ __('Márkák') }}</h1>

<div class="toolbar">
    <a href="{{ route('brands.create') }}">{{ __('Új márka') }}</a>
</div>

@include('components.search-form', ['action' => route('brands.index')])
@include('components.flash')

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>{{ __('Név') }}</th>
        <th>{{ __('Kategória') }}</th>
        <th>{{ __('Alkoholtartalom') }}</th>
        <th>{{ __('Műveletek') }}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->drinktype->name ?? '-' }}</td>
            <td>{{ $brand->alcohol_percent }}%</td>
            <td>
                <a href="{{ route('brands.show', $brand) }}">{{ __('Megtekintés') }}</a>
                <a href="{{ route('brands.edit', $brand) }}">{{ __('Szerkesztés') }}</a>
                <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="inline"
                      onsubmit="return confirm('{{ __('Biztosan törlöd?') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Törlés') }}</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">{{ __('Nincs ilyen márka a rendszerben.') }}</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
