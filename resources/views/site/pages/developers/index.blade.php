@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'Developers' : 'المطورين' }}</h3>
                    <ul>
                        <li><a href="{{ route('site.index') }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}</a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'Developers' : 'المطورين' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section_color">
        <div class="container">
            <div class="row">
                @foreach ($developers as $developer)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="organizer_item" data-aos="fade-up" data-aos-delay="30">
                            <div class="cover">
                                <img src="{{ get_image($developer->image, 'developers') }}" />
                            </div>
                            <div class="cont">
                                <a href="{{ route('site.developer', ['developer' => $developer->slug]) }}">
                                    {{ $developer->translate(app()->getLocale())->name }}</a>
                                <p>
                                    {{ substr($developer->translate(app()->getLocale())->brief ,0 , 100) }}...
                                </p>
                            </div>
                            <div class="sub_info">
                                <span class="number"> {{ $developer->projects->count() }}
                                    {{ app()->getLocale() == 'en' ? 'Project' : 'مشروع' }}</span>
                                <a href="{{ route('site.developer', ['developer' => $developer->slug]) }}">
                                    {{ app()->getLocale() == 'en' ? 'More Details' : 'المزيد' }} <i
                                        class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
