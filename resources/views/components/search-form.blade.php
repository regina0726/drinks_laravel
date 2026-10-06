<div class="search-bar">
    <form method="get" action="{{ $action }}" accept-charset="UTF-8" class="search-form">
        <input type="search" name="needle" value="{{ request('needle') }}" placeholder="{{ __('Keresés') }}">
        <button type="submit" title="{{ __('Keresés') }}">{{ __('Keresés') }}</button>
        @if (request()->filled('needle'))
            <a href="{{ $action }}">{{ __('Szűrő törlése') }}</a>
        @endif
    </form>
</div>
