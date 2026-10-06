@extends('layouts.app')

@section('title', __('Ital kategóriák'))

@section('content')
<h1>{{ __('Kategóriák') }}</h1>

<div class="toolbar">
    <a href="{{ route('drinktypes.create') }}">{{ __('Új kategória') }}</a>
</div>

@include('components.search-form', ['action' => route('drinktypes.index')])
@include('components.flash')

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>{{ __('Név') }}</th>
        <th>{{ __('Műveletek') }}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($drinktypes as $drinktype)
        <tr>
            <td>{{ $drinktype->id }}</td>
            <td>{{ $drinktype->name }}</td>
            <td>
                <a href="{{ route('drinktypes.show', $drinktype) }}">{{ __('Megtekintés') }}</a>
                <a href="{{ route('drinktypes.edit', $drinktype) }}">{{ __('Szerkesztés') }}</a>
                <form action="{{ route('drinktypes.destroy', $drinktype) }}" method="POST" class="inline"
                      onsubmit="return confirm('{{ __('Biztosan törlöd? A kategória összes márkája is törlődni fog!') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Törlés') }}</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">{{ __('Nincs ilyen kategória a rendszerben.') }}</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
