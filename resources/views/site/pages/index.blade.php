@extends('site.layouts.master')
@section('content')
    <!-- Main Section==========================================-->
    <section class="main_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <p>
                        @if (app()->getLocale() == 'en')
                            The platform Objective is to give general information for the
                            foreign investors to support the FDI within the real estate market
                            in egypt
                        @else
                            الهدف من المنصة هو إعطاء معلومات عامة للمستثمرين الأجانب لدعم الاستثمار الأجنبي المباشر في سوق
                            العقارات في مصر
                        @endif
                    </p>
                    <div class="numbers">
                        <div class="counter">
                            <i class="fa fa-building"></i>
                            <div class="cont">
                                <span class="timer" data-to="{{ \App\Models\Project::count() }}" data-speed="1500">
                                    0</span>
                                {{ app()->getLocale() == 'en' ? 'Project' : 'مشروع' }}
                            </div>
                        </div>
                        <!--End Counter-->
                        <div class="counter">
                            <i class="fa fa-users"></i>
                            <div class="cont">
                                <span class="timer" data-to="{{ \App\Models\Developer::count() }}" data-speed="200">
                                    {{ \App\Models\Developer::count() }}</span>
                                {{ app()->getLocale() == 'en' ? 'Developer' : 'مطور عقاري' }}
                            </div>
                        </div>
                        <!--End Counter-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section==========================================-->
    <section class="section_color search_result">
        <div class="search">
            <div class="container">
                <form class="row" method="get" action="{{ route('site.search') }}">
                    @csrf
                    @method('get')
                    <div class="form-group">
                        <select class="select" name="location_id">
                            <option value="" selected>
                                {{ app()->getLocale() == 'en' ? 'Project Location' : 'المنطقه' }}</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">
                                    {{ $location->translate(app()->getLocale())->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="select" name="type_id">
                            <option value="" selected>
                                {{ app()->getLocale() == 'en' ? 'projects Type' : 'المشاريع' }}</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->translate(app()->getLocale())->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="select" name="installment">
                            <option value="" selected>
                                {{ app()->getLocale() == 'en' ? 'Installments' : 'التقسيط (سنوات)' }}</option>
                            @foreach ($sorted_installments as $sorted_installment)
                                <option value="{{ $sorted_installment }}">
                                    {{ $sorted_installment }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="select" name="down_payment">
                            <option value="" selected>
                                {{ app()->getLocale() == 'en' ? 'Down payment' : 'مقدم التعاقد' }} (%)</option>
                            @foreach ($sorted_down_payments as $sorted_down_payment)
                                <option value="{{ $sorted_down_payment }}">
                                    {{ $sorted_down_payment }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="link" type="submit">
                        <span> <i class="fa fa-search"></i> {{ app()->getLocale() == 'en' ? 'Search' : 'بحث' }} </span>
                    </button>
                </form>
                <!--End Row-->
            </div>
        </div>
        <!--End Container-->
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="60">
                    <div class="section_title">{{ app()->getLocale() == 'en' ? 'Your Recommendations' : 'نتائج البحث' }}
                    </div>
                </div>
                <!--End Col-->
                @foreach ($recommendations as $project)
                    <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="60">
                        <div class="project_item">
                            <div class="cover">
                                <span class="tag"> {{ $project->status->translate(app()->getLocale())->name }}
                                </span>
                                <img src="{{ get_image($project->image, 'projects') }}" />
                                <a href="{{ route('site.project', ['project' => $project->slug]) }}" class="icon_link">
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
                @endforeach
                {{-- <div class="col-12" data-aos="fade-up" data-aos-delay="240">
                    <button class="link">
                        <span> {{ app()->getLocale() == 'en' ? 'Load More' : 'تحميل المزيد' }} <i
                                class="fa fa-angle-right"></i> </span>
                    </button>
                </div> --}}
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
    <!-- Section==========================================-->
    <section>
        <!--End Container-->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        {{ app()->getLocale() == 'en' ? 'Top Featured Projects' : 'المشاريع المميزة' }}</div>
                </div>
                <!--End Col-->
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($featured_projects as $featured_project)
                            <div class="item">
                                <a href="{{ route('site.project', ['project' => $featured_project->slug]) }}"
                                    class="project_item_box">
                                    @if ($featured_project->status->translate(app()->getLocale())->name)
                                        <span class="tag">
                                            {{ $featured_project->status->translate(app()->getLocale())->name }}
                                        </span>
                                    @endif
                                    <img src="{{ get_image($featured_project->image, 'projects') }}" />
                                    <div class="cont">
                                        <h3>{{ $featured_project->translate(app()->getLocale())->name }}</h3>
                                        <p>
                                            <i class="fa fa-map-marker-alt"></i>
                                            {{ $featured_project->location_relation->translate(app()->getLocale())->name }}
                                        </p>
                                        <h4>
                                            {{ $featured_project->project_area }}
                                            {{ app()->getLocale() == 'en' ? 'M2' : 'م2' }},
                                            {{ $featured_project->developer_relation->translate(app()->getLocale())->name }}
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
    <!-- Section ==========================================-->
    <section class="section_color">
        <!--End Container-->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">{{ app()->getLocale() == 'en' ? 'Latest Projects' : 'اخر المشاريع' }}
                    </div>
                </div>
                <!--End Col-->
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($projects as $project)
                            <div class="item">
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
                        @endforeach
                    </div>
                </div>
                <!--End Col-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
@endsection
