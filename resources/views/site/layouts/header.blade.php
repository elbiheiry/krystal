<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('site.index') }}" class="logo" alt="logo">
                    <img src="{{ surl('images/logo.png') }}" />
                </a>
                <div class="btns">
                    @if (app()->getLocale() == 'en')
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="icon_link"> AR </a>
                    @else
                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="icon_link"> EN </a>
                    @endif
                    <button class="icon_link menu_btn" data-toggle="collapse" type="button" data-target="#main_nav">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" id="header_spy">
        <div class="container">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="nav">
                    <li>
                        <a href="{{ route('site.index') }}"
                            class="{{ request()->routeIs('site.index') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }} </a>
                    </li>

                    <li>
                        <a href="{{ route('site.developers') }}"
                            class="{{ request()->routeIs('site.developers') || request()->routeIs('site.developer') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'en' ? 'Developers' : 'المطورين' }} </a>
                    </li>
                    <li class="dropdown unset">
                        <a href="#" class="extra {{ request()->routeIs('site.location') ? 'active' : '' }}"
                            data-toggle="dropdown">
                            {{ app()->getLocale() == 'en' ? 'Locations' : 'المناطق' }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        @php
                            $locations = \App\Models\Location::all()->sortByDesc('id');
                        @endphp

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($locations as $location)
                                <div class="dropdown-item"
                                    style="background-image: url({{ get_image($location->image, 'locations') }});">
                                    <a href="{{ route('site.location', ['location' => $location->slug]) }}">
                                        {{ $location->translate(app()->getLocale())->name }}
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="extra {{ request()->routeIs('site.type') ? 'active' : '' }}"
                            data-toggle="dropdown">
                            {{ app()->getLocale() == 'en' ? 'projects Type' : 'المشاريع' }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        @php
                            $types = \App\Models\Type::all()->sortByDesc('id');
                        @endphp
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($types as $type)
                                <a href="{{ route('site.type', ['type' => $type->slug]) }}" class="dropdown-item">
                                    {{ $type->translate(app()->getLocale())->name }} <span>
                                        {{ $type->projects->count() }} </span></a>
                            @endforeach
                        </div>
                    </li>
                    @if (auth()->guard('site')->check())
                        <li>
                            <button class="logout"
                                onclick="$('#logout-form').submit()">{{ app()->getLocale() == 'en' ? 'Logout' : 'تسجيل خروج' }}</button>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
<form id="logout-form" action="{{ route('site.logout') }}" method="post">
    @csrf
</form>
