<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <img src="{{ surl('images/logo.png') }}" />
            </div>
            <!--End Col-->
            <div class="col-lg-4 col-md-12">
                <h3>{{ app()->getLocale() == 'en' ? 'Locations' : 'المناطق' }}</h3>
                <ul class="quick_links row">
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($locations as $index => $location)
                        @if ($x == 0)
                            <li class="col-12">
                                <a href="{{ route('site.location', ['location' => $location->slug]) }}">
                                    {{ $location->translate(app()->getLocale())->name }} </a>
                            </li>
                        @else
                            <li class="col-lg-6 col-md-4 col-sm-6 col-6">
                                <a href="{{ route('site.location', ['location' => $location->slug]) }}">
                                    {{ $location->translate(app()->getLocale())->name }} </a>
                            </li>
                        @endif
                        @php
                            $x++;
                        @endphp
                    @endforeach
                </ul>
            </div>
            <!--End Col-->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3>{{ app()->getLocale() == 'en' ? 'projects Type' : 'المشاريع' }}</h3>
                <ul class="quick_links row">
                    @foreach ($types as $type)
                        <li class="col-lg-12 col-md-12 col-sm-12 col-6">
                            <a href="{{ route('site.type', ['type' => $type->slug]) }}">
                                {{ $type->translate(app()->getLocale())->name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--End Col-->
            <div class="col-lg-2 col-md-6 col-sm-6">
                <h3>{{ app()->getLocale() == 'en' ? 'Info' : 'معلومات' }}</h3>
                <ul class="quick_links row">
                    <li class="col-lg-12 col-md-12 col-sm-12 col-6">
                        <a href="about.html"> {{ app()->getLocale() == 'en' ? 'About us' : 'من نحن' }} </a>
                    </li>
                    <li class="col-lg-12 col-md-12 col-sm-12 col-6">
                        <a href="terms_conditions.html">
                            {{ app()->getLocale() == 'en' ? 'Terms & Conditions' : 'الشروط والأحكام' }} </a>
                    </li>
                    <li class="col-lg-12 col-md-12 col-sm-12 col-6">
                        <a href="privacy_policy.html">{{ app()->getLocale() == 'en' ? 'Privacy Policy' : 'سياسة الخصوصية' }}
                        </a>
                    </li>
                    <li class="col-lg-12 col-md-12 col-sm-12 col-6">
                        <a href="faqs.html"> {{ app()->getLocale() == 'en' ? 'FAQS' : 'الأسئلة الشائعة' }} </a>
                    </li>
                </ul>
            </div>
            <!--End Col-->
        </div>
        <!--End Row-->
    </div>
    <!--End Container-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if (app()->getLocale() == 'en')
                        <p>Copyright © 2022 Krystal</p>
                    @else
                        <p>حقوق النشر © 2022 Krystal</p>
                    @endif

                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </div>
</footer>
