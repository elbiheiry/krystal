<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
@include('site.layouts.head')

<body>
    <!-- Looder
    ==========================================-->
    <div class="preloader" hiddin>
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Header
    ==========================================-->
    @include('site.layouts.header')
    @yield('content')
    <!-- Footer
    ==========================================-->
    @include('site.layouts.footer')
    <!--End Footer-->
    <!-- Up Button
    ==========================================-->
    <button class="up_btn icon_link">
        <i class="fa fa-angle-up"></i>
    </button>

    @if (auth()->guard('site')->guest())
        <!-- Fxed Login-->
        <div class="fixed_alert shadow">
            <button class="icon_link">X</button>
            <h3>{{ app()->getLocale() == 'en' ? 'Join Us' : 'إنضم إلينا' }}</h3>
            <p>
                {{ app()->getLocale() == 'en'
                    ? 'GIVE GENERAL INFORMATION FOR THE FOREIGN INVESTORS TO SUPPORT THE FDI'
                    : 'نقدم معلومات عامة للمستثمرين الأجانب لدعم الاستثمار الأجنبي المباشر' }}
            </p>
            <a href="{{ route('site.register') }}" class="link">
                <span> {{ app()->getLocale() == 'en' ? 'Register Now' : 'تسجيل الان' }} </span>
            </a>
        </div>
    @endif

    @include('site.layouts.scripts')
</body>

</html>
