<div class="search-bar">
    <form method="get" action="{{ $action }}" accept-charset="UTF-8" class="search-form">
        <input type="search" name="needle" value="{{ request('needle') }}" placeholder="{{ __('Keresés') }}">
        <button type="submit" title="{{ __('Keres') }}">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>