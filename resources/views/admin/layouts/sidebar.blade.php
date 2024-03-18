<!-- Side Menu
        ==========================================-->
<aside class="side-menu">
    <button class="toggle-btn">
        <i class="fa fa-times"></i>
    </button>
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ aurl('images/logo.png') }}" />
    </a>
    <ul>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                - Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.types.index') ? 'active' : '' }}">
            <a href="{{ route('admin.types.index') }}">
                - Project types
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.locations.index') ? 'active' : '' }}">
            <a href="{{ route('admin.locations.index') }}">
                - Locations
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.statuses.index') ? 'active' : '' }}">
            <a href="{{ route('admin.statuses.index') }}">
                - Status
            </a>
        </li>
        <li
            class="{{ request()->routeIs('admin.developers.index') || request()->routeIs('admin.developers.create') || request()->routeIs('admin.developers.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.developers.index') }}">
                - Developers
            </a>
        </li>
        <li
            class="{{ request()->routeIs('admin.projects.slider.index') || request()->routeIs('admin.projects.index') || request()->routeIs('admin.projects.create') || request()->routeIs('admin.projects.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.projects.index') }}">
                - Projects
            </a>
        </li>
    </ul>
    <!--End Ul-->
</aside>
<!--End Aside-->
