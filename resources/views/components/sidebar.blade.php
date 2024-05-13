<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Daniel Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Admin</a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item">
                <a href="/home" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                    class="nav-link"><i class="fas fa-columns"></i> <span>Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('universites.show', 1) }}"
                    class="nav-link"><i class="fas fa-columns"></i> <span>University</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('attendances.index') }}" class="nav-link">
                    <i class="fas fa-columns"></i>
                    <span>Attendances</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                    <i class="fas fa-columns"></i>
                    <span>Permission</span>
                </a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google
                        Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li> --}}

            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('auth-forgot-password') ? 'active' : '' }}">
                        <a href="{{ url('auth-forgot-password') }}">Forgot Password</a>
                    </li>
                    <li class="{{ Request::is('auth-login') ? 'active' : '' }}">
                        <a href="{{ url('auth-login') }}">Login</a>
                    </li>
                    <li class="{{ Request::is('auth-login2') ? 'active' : '' }}">
                        <a class="beep beep-sidebar"
                            href="{{ url('auth-login2') }}">Login 2</a>
                    </li>
                    <li class="{{ Request::is('auth-register') ? 'active' : '' }}">
                        <a href="{{ url('auth-register') }}">Register</a>
                    </li>
                    <li class="{{ Request::is('auth-reset-password') ? 'active' : '' }}">
                        <a href="{{ url('auth-reset-password') }}">Reset Password</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                    <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('error-403') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-403') }}">403</a>
                    </li>
                    <li class="{{ Request::is('error-404') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-404') }}">404</a>
                    </li>
                    <li class="{{ Request::is('error-500') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-500') }}">500</a>
                    </li>
                    <li class="{{ Request::is('error-503') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('error-503') }}">503</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-activities') }}">Activities</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-post-create') }}">Post Create</a>
                    </li>
                    <li class="{{ Request::is('features-post') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-post') }}">Posts</a>
                    </li>
                    <li class="{{ Request::is('features-profile') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-profile') }}">Profile</a>
                    </li>
                    <li class="{{ Request::is('features-settings') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-settings') }}">Settings</a>
                    </li>
                    <li class="{{ Request::is('features-setting-detail') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-setting-detail') }}">Setting Detail</a>
                    </li>
                    <li class="{{ Request::is('features-tickets') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('features-tickets') }}">Tickets</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                    <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('utilities-contact') ? 'active' : '' }}">
                        <a href="{{ url('utilities-contact') }}">Contact</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
