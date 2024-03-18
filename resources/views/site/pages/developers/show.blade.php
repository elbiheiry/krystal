@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="main_section page_head">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3>{{ $developer->translate(app()->getLocale())->name }}</h3>
                    <ul>
                        <li><a href="{{ route('site.index') }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}</a>
                        </li>
                        <li><a href="{{ route('site.developers') }}">
                                {{ app()->getLocale() == 'en' ? 'Developers' : 'المطورين' }} </a></li>
                        <li>{{ $developer->translate(app()->getLocale())->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="developer">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <img src="{{ get_image($developer->image, 'developers') }}" />
                            </div>
                            <!--End Col-->
                            <div class="col-lg-5 col-md-6">
                                <div class="cont">
                                    <h3>{{ $developer->translate(app()->getLocale())->name }}</h3>
                                    @foreach (explode("\n", $developer->translate(app()->getLocale())->brief) as $about)
                                        <p>
                                            {{ $about }}
                                        </p>
                                    @endforeach

                                    <div class="numbers">
                                        <div class="counter">
                                            <i class="fa fa-building"></i>
                                            <div class="cont">
                                                <span class="timer" data-to="{{ $developer->projects->count() }}"
                                                    data-speed="1500">{{ $developer->projects->count() }}</span>
                                                {{ app()->getLocale() == 'en' ? 'Project' : 'مشروع' }}
                                            </div>
                                        </div>
                                        <!--End Counter-->
                                    </div>
                                </div>
                            </div>
                            <!--End Col-->
                            <div class="col-lg-4 col-md-6">
                                <ul class="contact_info">
                                    @if ($developer->website)
                                        <li>
                                            <a href="{{ $developer->website }}" target="_blank"><i
                                                    class="fa fa-globe"></i>
                                                {{ app()->getLocale() == 'en' ? 'website' : 'الموقع الإلكتروني' }}
                                            </a>
                                        </li>
                                    @endif
                                    @if ($developer->phone)
                                        <li>
                                            <a href="tel:{{ $developer->phone }}"><i class="fa fa-phone"></i>
                                                {{ $developer->phone }}</a>
                                        </li>
                                    @endif
                                    @if ($developer->email)
                                        <li>
                                            <a href="mailto:{{ $developer->email }}"><i class="fa fa-envelope"></i>
                                                <span>
                                                    {{ $developer->email }} </span> </a>
                                        </li>
                                    @endif
                                    <li class="social">
                                        <ol>
                                            @if ($developer->facebook)
                                                <li><a href="{{ $developer->facebook }}" target="_blank"
                                                        class="fab fa-facebook facebook_bc"></a></li>
                                            @endif
                                            @if ($developer->twitter)
                                                <li><a href="{{ $developer->twitter }}" class="fab fa-twitter twitter_bc"
                                                        target="_blank"></a></li>
                                            @endif
                                            @if ($developer->linkedin)
                                                <li><a href="{{ $developer->linkedin }}"
                                                        class="fab fa-linkedin linkedin_bc" target="_blank"></a></li>
                                            @endif
                                            @if ($developer->youtube)
                                                <li><a href="{{ $developer->youtube }}" class="fab fa-youtube youtube_bc"
                                                        target="_blank"></a></li>
                                            @endif
                                            @if ($developer->instagram)
                                                <li><a href="{{ $developer->instagram }}"
                                                        class="fab fa-instagram instagram_bc" target="_blank"></a></li>
                                            @endif
                                        </ol>
                                    </li>
                                </ul>
                            </div>
                            <!--End Col-->
                        </div>
                        <!--End Row-->
                    </div>
                    <!--End div-->
                </div>
                <!--End Col-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
    <!-- Section==========================================-->
    <section class="section_color">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($developer->projects as $project)
                        <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="60">
                            <div class="project_item">
                                <div class="cover">
                                    @if ($project->status->translate(app()->getLocale())->name)
                                        <span class="tag">
                                            {{ $project->status->translate(app()->getLocale())->name }}
                                        </span>
                                    @endif
                                    <img src="{{ get_image($project->image, 'projects') }}" />
                                    <a href="{{ route('site.project', ['project' => $project->slug]) }}"
                                        class="icon_link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <!--End Cover-->
                                <div class="cont">
                                    <h4 class="type">
                                        {{ app()->getLocale() == 'en' ? 'down payment' : 'مقدم التعاقد' }} :
                                        {{ $project->down_payment }}%</h4>
                                    <a href="{{ route('site.project', ['project' => $project->slug]) }}">{{ $project->translate(app()->getLocale())->name }}
                                    </a>
                                    <ul>
                                        <li>
                                            <i class="fa fa-map-marker-alt"></i>
                                            {{ $project->location_relation->translate(app()->getLocale())->name }}
                                        </li>
                                        <li><i class="fas fa-expand"></i> {{ $project->project_area }}
                                            {{ app()->getLocale() == 'en' ? 'M2' : 'م2' }}</li>
                                        <li><i class="fa fa-building"></i>
                                            {{ $project->developer_relation->translate(app()->getLocale())->name }}
                                        </li>
                                    </ul>
                                </div>
                                <!--End Cont-->
                                <div class="sub_info">
                                    <span class="price"> {{ app()->getLocale() == 'en' ? 'Installment' : 'تقسيط' }}
                                        {{ $project->installment }}
                                        {{ app()->getLocale() == 'en' ? 'Years' : 'سنوات' }} </span>
                                    <a href="{{ route('site.project', ['project' => $project->slug]) }}">
                                        {{ app()->getLocale() == 'en' ? 'More Details' : 'المزيد' }} <i
                                            class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                <!--End Info-->
                            </div>
                            <!--End Propperty-->
                        </div>
                        <!--End Col-->
                    @endforeach
                    <!--End Col-->
                    {{-- <div class="col-12" data-aos="fade-up" data-aos-delay="240">
                            <button class="link">
                                <span> Load More <i class="fa fa-angle-right"></i> </span>
                            </button>
                        </div> --}}
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
