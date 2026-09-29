<div>
    <!-- He who is contented is rich. - Laozi -->
</div>
<nav>
  <a href="{{ url('/') }}">{{ __('navigation.homepage') }}</a>
  <a href="{{ route('drinktypes.index') }}">{{ __('navigation.drinktypes') }}</a>
  <a href="{{ route('brands.index') }}">{{ __('navigation.brands') }}</a>
  
  @auth
      <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit">{{ __('navigation.logout') }} ({{ auth()->user()->name }})</button>
      </form>
  @else
      <a href="{{ route('login') }}">{{ __('navigation.login') }}</a>
  @endauth
</nav>