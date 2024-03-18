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
    <!-- Main Section
    ==========================================-->
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login_wrap">
                        <form method="post" action="{{ route('site.register') }}">
                            @csrf
                            @method('post')
                            <div class="form-title">
                                <a href="{{ route('site.index') }}"><img src="{{ surl('images/logo.png') }}" /></a>
                                {{ app()->getLocale() == 'en' ? 'Register' : 'تسجيل مستخدم جديد' }}
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Your Name' : 'الإسم بالكامل' }}"
                                    name="name" value="{{ old('name') }}" />
                                <i class="fa fa-info"></i>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'E-mail' : 'البريد الإلكتروني' }}" />
                                <i class="far fa-envelope"></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Password' : 'الرقم السري' }}" />
                                <i class="fa fa-lock"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-100">
                                <button class="link">
                                    <span> {{ app()->getLocale() == 'en' ? 'Register' : 'تسجيل مستخدم جديد' }} <i
                                            class="fa fa-arrow-right"></i> </span>
                                </button>
                            </div>
                            <div class="text-spacer">
                                <p>{{ app()->getLocale() == 'en' ? 'OR LOGIN WITH SOCIAL ACCOUNT' : 'أو سجل دخول بحسابات السوشيال ميديا' }}
                                </p>

                                <ul class="social-login">
                                    <li>
                                        <button type="button" class="facebook_bc" onclick="fbLogin();" id="fbLink">
                                            <i class="fab fa-facebook"></i>
                                            {{ app()->getLocale() == 'en' ? 'login with facebook' : 'تسجيل دخول بالفيسبوك' }}
                                        </button>
                                    </li>

                                    <li>
                                        <button type="button" class="linkedin_bc linkedin">
                                            <i class="fab fa-linkedin"></i>
                                            {{ app()->getLocale() == 'en' ? 'login with linkedin' : 'تسجيل دخول بلينكد إن' }}
                                        </button>
                                    </li>

                                    <li>
                                        <button type="button" class="twitter_bc twitter">
                                            <i class="fab fa-twitter"></i>
                                            {{ app()->getLocale() == 'en' ? 'login with Twitter' : 'تسجيل دخول بتويتر ' }}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <a href="{{ route('site.login') }}" class="bottom_link">
                            {{ app()->getLocale() == 'en' ? 'Have Account, Login Now!' : 'تملك حساب بالغعل ! سجل دخول الان' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JS & Vendor Files
    ==========================================-->
    @include('site.layouts.scripts')
    <script>
        $('.linkedin').on('click', function() {
            window.location.href = "{{ route('site.login.redirect', ['provider' => 'linkedin']) }}"
        });
        $('.twitter').on('click', function() {
            window.location.href = "{{ route('site.login.redirect', ['provider' => 'twitter']) }}"
        });
        window.fbAsyncInit = function() {
            // FB JavaScript SDK configuration and setup
            FB.init({
                appId: '452482156208453', // FB App ID
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true, // parse social plugins on this page
                version: 'v3.2' // use graph api version 2.8
            });

            // Check whether the user already logged in
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    //display user data
                    getFbUserData();
                }
            });
        };

        // Load the JavaScript SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Facebook login with JavaScript SDK
        function fbLogin() {
            FB.login(function(response) {
                if (response.authResponse) {
                    // Get and display the user profile data
                    getFbUserData();
                } else {
                    notification("danger",
                        "{{ app()->getLocale() == 'en' ? 'Login using facebook is cancelled' : 'تم إلغاء عمليه تسجيل الدخول من خلالكم' }}",
                        "fas fa-times");
                }
            }, {
                scope: 'email'
            });
        }

        // Fetch the user profile data from facebook
        function getFbUserData() {
            FB.api('/me', {
                    locale: 'en_US',
                    fields: 'id,first_name,last_name,email,link,gender,locale,picture'
                },
                function(response) {
                    saveUserData(response);
                });
        }

        // Save user data to the database
        function saveUserData(userData) {
            $.ajax({
                url: "{{ route('site.login.facebook', ['provider' => 'facebook']) }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: userData,
                dataType: 'json',
                method: 'post',
                success: function(response) {
                    notification("success", response, "fas fa-check");
                    window.location.reload();
                }
            });
        }
    </script>
</body>

</html>
