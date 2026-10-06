<nav>
    <a href="{{ url('/') }}">{{ __('navigation.homepage') }}</a>
    <a href="{{ route('drinktypes.index') }}">{{ __('navigation.drinktypes') }}</a>
    <a href="{{ route('brands.index') }}">{{ __('navigation.brands') }}</a>

    {{-- A belépés/kilépés csak akkor jelenik meg, ha telepítve van a hitelesítés (van login útvonal). --}}
    @if (Route::has('login'))
        @auth
            <form action="{{ route('logout') }}" method="post" class="inline">
                @csrf
                <button type="submit">{{ __('navigation.logout') }} ({{ auth()->user()->name }})</button>
            </form>
        @else
            <a href="{{ route('login') }}">{{ __('navigation.login') }}</a>
        @endauth
    @endif
</nav>
