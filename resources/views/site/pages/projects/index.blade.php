@extends('site.layouts.master')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush
@section('content')
    <!-- Main Section =========================================-->
    <section class="main_section page_head">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3>{{ $project->translate(app()->getLocale())->name }}</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="section_color">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="swiper_wrap">
                        <div style=" --swiper-navigation-color: #fff;--swiper-pagination-color: #fff;"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($project->images()->where('type', 'main')->get()
        as $image)
                                    <div class="swiper-slide">
                                        <a href="{{ get_image($image->image, 'projects') }}" data-fancybox="gallery">
                                            <img src="{{ get_image($image->image, 'projects') }}" />
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($project->images()->where('type', 'main')->get()
        as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ get_image($image->image, 'projects') }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="sec_id" id="about"></div>
                </div>
                <!--End Col-->
                <div class="col-lg-3">
                    <ul class="side_info">
                        <div class="row m-0">
                            <li class="col-12">
                                <a
                                    href="{{ route('site.developer', ['developer' => $project->developer_relation->slug]) }}">
                                    <i class="fa fa-building"></i>
                                    <div class="data">
                                        {{ app()->getLocale() == 'en' ? 'Developer' : 'المطور العقاري ' }} <span>
                                            {{ $project->developer_relation->translate(app()->getLocale())->name }}
                                        </span>
                                    </div>
                                </a>
                            </li>

                            <li class="col-lg-12 col-md-6 col-sm-6">
                                <a href="{{ route('site.location', ['location' => $project->location_relation->slug]) }}">
                                    <i class="fa fa-map-marker-alt"></i>

                                    <div class="data">{{ app()->getLocale() == 'en' ? 'Location' : 'الموقع' }} <span>
                                            {{ $project->location_relation->translate(app()->getLocale())->name }}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="col-lg-12 col-md-6 col-sm-6">
                                <i class="fa fa-ruler-combined"></i>
                                <div class="data">
                                    {{ app()->getLocale() == 'en' ? 'project area' : 'مساحة المشروع' }} <span>
                                        {{ $project->project_area }} {{ app()->getLocale() == 'en' ? 'M' : 'متر' }}
                                        <sup>2</sup></span>
                                </div>
                            </li>
                            @if ($project->installment)
                                <li class="col-lg-12 col-md-6 col-sm-6">
                                    <a href="projects.html">
                                        <i class="fa fa-list"></i>
                                        <div class="data">
                                            {{ app()->getLocale() == 'en' ? 'Installment' : 'تقسيط' }}
                                            <span> {{ $project->installment }}
                                                {{ app()->getLocale() == 'en' ? 'Years' : 'سنوات' }} </span>

                                        </div>
                                    </a>
                                </li>
                            @endif
                            @if ($project->down_payment)
                                <li class="col-lg-12 col-md-6 col-sm-6">
                                    <a href="projects.html">
                                        <i class="fas fa-dollar-sign"></i>
                                        <div class="data">
                                            {{ app()->getLocale() == 'en' ? 'down payment' : 'مقدم التعاقد' }} <span>
                                                {{ $project->down_payment }}%</span></div>
                                    </a>
                                </li>
                            @endif
                            @if ($project->delivery)
                                <li class="col-lg-12 col-md-6 col-sm-6">
                                    <a href="projects.html">
                                        <i class="fa fa-calendar-alt"></i>
                                        <div class="data">
                                            {{ app()->getLocale() == 'en' ? 'project delivery' : 'موعد التسليم' }} <span>
                                                {{ $project->delivery }}</span></div>
                                    </a>
                                </li>
                            @endif
                        </div>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="item_info">
                        <h3><i class="fa fa-info"></i> {{ app()->getLocale() == 'en' ? 'About' : 'عن ' }}
                            {{ $project->translate(app()->getLocale())->name }}</h3>
                        <div class="cont">
                            @foreach (explode("\n", $project->translate(app()->getLocale())->about) as $about)
                                <p>{{ $about }}</p>
                            @endforeach
                        </div>

                        <div class="sec_id" id="facilities"></div>
                    </div>
                    <div class="item_info">
                        <h3><i class="fa fa-info"></i> {{ app()->getLocale() == 'en' ? 'About' : 'عن ' }}
                            {{ $project->developer_relation->translate(app()->getLocale())->name }}</h3>
                        <div class="cont">
                            @foreach (explode("\n", $project->developer_relation->translate(app()->getLocale())->brief) as $about)
                                <p>{{ $about }}</p>
                            @endforeach
                        </div>

                        <div class="sec_id" id="facilities"></div>
                    </div>
                    @if ($project->translate(app()->getLocale())->facilities)
                        <div class="item_info">
                            <h3><i class="far fa-bookmark"></i>
                                {{ app()->getLocale() == 'en' ? 'Project Facilities' : 'مرافق المشروع' }}
                            </h3>
                            <div class="cont">
                                <ul class="features_list">
                                    @foreach (explode(',', $project->translate(app()->getLocale())->facilities) as $facility)
                                        <li class="feature">{{ $facility }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sec_id" id="location"></div>
                        </div>
                    @endif

                    @if ($project->map)
                        <div class="item_info">
                            <h3><i class="fa fa-map-marker-alt"></i>
                                {{ app()->getLocale() == 'en' ? 'Project Loaction' : 'موقع المشروع' }}</h3>
                            <div class="cont">
                                <iframe src="{{ $project->map }}" width="100%" height="480" style="border: 0"
                                    allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="sec_id" id="areas"></div>
                        </div>
                    @endif
                    @if ($project->translate(app()->getLocale())->area)
                        <div class="item_info">
                            <h3><i class="fas fa-expand"></i>
                                {{ app()->getLocale() == 'en' ? 'Project Areas' : 'مواقع المشروع' }}</h3>
                            <div class="cont">
                                <ul class="list">
                                    @foreach (explode("\n", $project->translate(app()->getLocale())->area) as $area)
                                        <li>
                                            {{ $area }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sec_id" id="payment"></div>
                        </div>
                    @endif
                    @if ($project->translate(app()->getLocale())->payments)
                        <div class="item_info">
                            <h3><i class="fas fa-dollar-sign"></i>
                                {{ app()->getLocale() == 'en' ? 'Payments' : 'الدفع' }}
                            </h3>
                            <div class="cont">
                                <ul class="list">
                                    @foreach (explode("\n", $project->translate(app()->getLocale())->payments) as $payment)
                                        <li>
                                            {{ $payment }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="item_info">
                        <h3>
                            @if (app()->getLocale() == 'en')
                                If you want more support and information, enter your details
                                below and we will contact you
                            @else
                                إذا كنت تريد الحصول علي المزيد من المعلومات برجاء التواصل معنا وسيتم الرد عليك في أقرب وقت
                            @endif
                        </h3>
                        <form class="cont ajax-form" method="post"
                            action="{{ route('site.project.store', ['id' => $project->id]) }}">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> {{ app()->getLocale() == 'en' ? 'Full Name' : 'الإسم بالكامل' }} </label>
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف' }} </label>
                                        <input type="text" class="form-control" name="phone" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ app()->getLocale() == 'en' ? 'Email Address' : 'البريد الإلكتروني' }}
                                        </label>
                                        <input type="text" class="form-control" name="email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="link" type="submit">
                                        <span> {{ app()->getLocale() == 'en' ? 'Send Message' : 'إرسل رسالتك' }} </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item_info sticky">
                        <h3 class="colored">
                            {{ app()->getLocale() == 'en' ? 'project guide' : 'دليل المشروع' }}
                        </h3>
                        <ul class="guide">
                            <li>
                                <a href="#about">
                                    <i class="fa fa-info"></i>
                                    {{ app()->getLocale() == 'en' ? 'About' : 'عن المشروع' }}
                                </a>
                                @if ($project->translate(app()->getLocale())->facilities)
                                    <a href="#facilities">
                                        <i class="far fa-bookmark"></i>
                                        {{ app()->getLocale() == 'en' ? 'Facilities' : 'المرافق' }}
                                    </a>
                                @endif
                                <a href="#location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    {{ app()->getLocale() == 'en' ? 'Location' : 'الموقع' }}
                                </a>

                                <a href="#areas">
                                    <i class="fa fa-expand"></i>
                                    {{ app()->getLocale() == 'en' ? 'areas' : 'المساحات' }}
                                </a>
                                <a href="#payment">
                                    <i class="fa fa-dollar-sign"></i>
                                    {{ app()->getLocale() == 'en' ? 'payment' : 'الدفع' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
    <!-- Project Contact-->
    <div class="fixed_btn">
        <a href="https://wa.me/+201" class="icon_link fab fa-whatsapp" target="_blank"></a>
        <a href="http://m.me/PAGE_NAME" class="icon_link fab fa-facebook-messenger" target="_blank"></a>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="30">
                    <div class="section_title">
                        {{ app()->getLocale() == 'en' ? 'Related Projects' : 'المشاريع المتعلقة' }}
                    </div>
                </div>
                <!--End Col-->

                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($related_projects as $related_project)
                            <div class="item">
                                <div class="project_item">
                                    <div class="cover">
                                        @if ($related_project->status->translate(app()->getLocale())->name)
                                            <span class="tag">
                                                {{ $related_project->status->translate(app()->getLocale())->name }}
                                            </span>
                                        @endif

                                        <img src="{{ get_image($related_project->image, 'projects') }}" />
                                        <a href="{{ route('site.project', ['project' => $related_project->slug]) }}"
                                            class="icon_link">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                    <!--End Cover-->
                                    <div class="cont">
                                        <h4 class="type">
                                            {{ app()->getLocale() == 'en' ? 'down payment' : 'مقدم التعاقد' }} :
                                            {{ $related_project->down_payment }}%</h4>
                                        <a href="{{ route('site.project', ['project' => $related_project->slug]) }}">{{ $related_project->translate(app()->getLocale())->name }}
                                        </a>
                                        <ul>
                                            <li>
                                                <i class="fa fa-map-marker-alt"></i>
                                                {{ $related_project->location_relation->translate(app()->getLocale())->name }}
                                            </li>
                                            <li><i class="fas fa-expand"></i> {{ $related_project->project_area }}
                                                {{ app()->getLocale() == 'en' ? 'M2' : 'م2' }}</li>
                                            <li><i class="fa fa-building"></i>
                                                {{ $related_project->developer_relation->translate(app()->getLocale())->name }}
                                            </li>
                                        </ul>
                                    </div>
                                    <!--End Cont-->
                                    <div class="sub_info">
                                        <span class="price"> {{ app()->getLocale() == 'en' ? 'Installment' : 'تقسيط' }}
                                            {{ $related_project->installment }}
                                            {{ app()->getLocale() == 'en' ? 'Years' : 'سنوات' }} </span>
                                        <a href="{{ route('site.project', ['project' => $related_project->slug]) }}">
                                            {{ app()->getLocale() == 'en' ? 'More Details' : 'المزيد' }} <i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                    <!--End Info-->
                                </div>
                                <!--End Propperty-->
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--End Col-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
@push('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            grabCursor: true,
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            grabCursor: true,
            spaceBetween: 10,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endpush
