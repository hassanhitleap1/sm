<a href="#" class="btn btn-neutral btn-icon web-menu" data-toggle="dropdown" role="button">
    <span class="btn-inner--icon">
        <i class="fa fa-user mr-2"></i>
      </span>
    <span class="nav-link-inner--text">{{ Auth::user()->name }}</span>
</a>
<a href="#" class="nav-link nav-link-icon mobile-menu" data-toggle="dropdown" role="button">
    <span class="btn-inner--icon">
        <i class="fa fa-user mr-2"></i>
      </span>
    <span class="nav-link-inner--text">{{ Auth::user()->name }}</span>
</a>
<div class="dropdown-menu">
    <a href="/profile" class="dropdown-item">{{ __('Profile') }}</a>
    @role('admin')
        <a href="/home" class="dropdown-item">{{ __('Dashboard') }}</a>
        <a class="dropdown-item " href="/live">{{ __('Live Orders') }}</a>
        <a href="/orders" class="dropdown-item">{{ __('qrlanding.orders') }}</a>
        <a href="/restaurants" class="dropdown-item">{{ __('Restaurants') }}</a>
        <a href="{{ route('reviews.index') }}" class="dropdown-item">{{ __('Reviews') }}</a>
        @if(env('MULTI_CITY',false))
            <a href="{{ route('cities.index') }}" class="dropdown-item">{{ __('Cities') }}</a>
        @endif
        <a href="/drivers" class="dropdown-item">{{ __('Drivers') }}</a>
        <a href="/clients" class="dropdown-item">{{ __('Clients') }}</a>
        <a href="/pages" class="dropdown-item">{{ __('Pages') }}</a>
        @if(env('ENABLE_PRICING',false))
            <a href="{{ route('plans.index') }}" class="dropdown-item">{{ __('Pricing plans') }}</a>
        @endif
        @if(config('app.ordering')&&env('ENABLE_FINANCES_ADMIN',true))
            <a href="{{ route('finances.admin') }}" class="dropdown-item">{{ __('Finances') }}</a>
        @endif
        <a href="/settings" class="dropdown-item">{{ __('Settings') }}</a>
    @endrole
    @role('owner')
        <a href="/home" class="dropdown-item">{{ __('Dashboard') }}</a>
        <a class="dropdown-item " href="/live">{{ __('Live Orders') }}</a>
        <a href="/orders" class="dropdown-item">{{ __('qrlanding.orders') }}</a>
        <a href="{{ route('admin.restaurants.edit', auth()->user()->restorant->id) }}" class="dropdown-item">{{ __('Restaurant') }}</a>
        <a href="/items" class="dropdown-item">{{ __('Menu') }}</a>
        @if(config('app.ordering')&&env('ENABLE_FINANCES_OWNER',true))
            <a href="{{ route('finances.owner') }}" class="dropdown-item">{{ __('Finances') }}</a>
        @endif
        @if(env('ENABLE_PRICING',false))
            <a href="{{ route('plans.current') }}" class="dropdown-item">{{ __('Plan') }}</a>
        @endif
    @endrole
    @role('client')
        <a href="/orders" class="dropdown-item">{{ __('My Orders') }}</a>
        <a href="/addresses" class="dropdown-item">{{ __('My Addresses') }}</a>
    @endrole
    @role('driver')
        <a href="/orders" class="dropdown-item">{{ __('qrlanding.orders') }}</a>
    @endrole

   <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <span>{{ __('Logout') }}</span>
    </a>
</div>
