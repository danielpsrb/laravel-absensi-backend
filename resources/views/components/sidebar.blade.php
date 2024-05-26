<div class="main-sidebar sidebar-style-2 bg-dark">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img alt="image" src="{{ asset('img/attendance-icon.png')}}" width="40" class="header-logo" />
                <span class="logo-name text-white">ADMIN ATTENDANCE</span>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
                <img alt="image" src="{{ asset('img/attendance-icon.png')}}" width="30" class="header-logo" />
            </a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item">
                <a href="/home" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                    class="nav-link"><i class="fas fa-user"></i> <span>Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('universites.show', 1) }}"
                    class="nav-link"><i class="fas fa-university"></i> <span>University</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('departments.index') }}"
                    class="nav-link"><i class="fas fa-building"></i> <span>Study Program</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('faculties.index') }}"
                    class="nav-link"><i class="fas fa-building"></i> <span>Fakultas</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('attendances.index') }}" class="nav-link">
                    <i class="fas fa-calendar-check"></i>
                    <span>Attendances</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                    <i class="fas fa-key"></i>
                    <span>Permission</span>
                </a>
            </li>

            <li class="menu-header">Pages Features</li>
            <li class="nav-item">
                <a href="{{ url('features-activities') }}"
                    class="nav-link"><i class="fas fa-history"></i> <span>Activities</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact') }}"
                    class="nav-link"><i class="fas fa-address-book"></i> <span>Contact</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('create') }}"
                    class="nav-link"><i class="fas fa-plus"></i> <span>Create Post</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('show') }}"
                    class="nav-link"><i class="fas fa-list"></i> <span>See All Post</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
