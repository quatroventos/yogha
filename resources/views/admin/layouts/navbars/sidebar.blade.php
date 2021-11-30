<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}" data-color="orange">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <h2>Yogha <small>v 1.0</small></h2>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'shelves') active @endif">
                <a class="nav-link" href="{{route('page.index', 'admin/shelves')}}">
                    <i class="nc-icon nc-layers-3"></i>
                    <p>Prateleiras</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'services') active @endif">
                <a class="nav-link" href="{{route('page.index', 'admin/services')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Serviços</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'blog') active @endif">
                <a class="nav-link" href="{{route('page.index', 'admin/blog')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Posts do blog</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'blog_cat') active @endif">
                <a class="nav-link" href="{{route('page.index', 'admin/blog_cat')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Categorias do blog</p>
                </a>
            </li>

            <!--<li class="nav-item @if($activePage == 'typography') active @endif">
                <a class="nav-link" href="{{route('page.index', 'typography')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Typography") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Icons") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{route('page.index', 'maps')}}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Maps") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Notifications") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-danger" href="{{route('page.index', 'upgrade')}}">
                    <i class="nc-icon nc-alien-33"></i>
                    <p>{{ __("Upgrade to PRO") }}</p>
                </a>
            </li>-->
        </ul>
    </div>
</div>
