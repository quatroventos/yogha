@if (auth()->check() && request()->route()->getName() != null)
    @include('admin.layouts.navbars.navs.auth')
@else
    @include('admin.layouts.navbars.navs.guest')
@endif
