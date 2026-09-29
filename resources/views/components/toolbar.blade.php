<div class="toolbar">
    @if($isAuthenticated)
        <a href="{{ $routes['create'] ?? '#' }}">{{ __('Új') }}</a>
    @endif
    <a href="{{ $routes['csv'] ?? '#' }}">{{ __('CSV') }}</a>
    <a href="{{ $routes['pdf'] ?? '#' }}">{{ __('PDF') }}</a>
    <a href="{{ $routes['mail'] ?? '#' }}">{{ __('Mail') }}</a>
</div>