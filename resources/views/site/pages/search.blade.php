@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="main_section page_head">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'Search results' : 'نتائج البحث' }}</h3>
                    <ul>
                        <li><a href="{{ route('site.index') }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}</a></li>
                        <li>{{ app()->getLocale() == 'en' ? 'Search results' : 'نتائج البحث' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Section==========================================-->
    <section class="section_color">
        <div class="container">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="60">
                        <div class="project_item">
                            <div class="cover">
                                @if ($project->status->translate(app()->getLocale())->name)
                                    <span class="tag"> {{ $project->status->translate(app()->getLocale())->name }}
                                    </span>
                                @endif
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
                            <!--End Info-->
                        </div>
                        <!--End Propperty-->
                    </div>
                @endforeach

                {{-- <div class="col-12" data-aos="fade-up" data-aos-delay="240">
                    <button class="link">
                        <span> Load More <i class="fa fa-angle-right"></i> </span>
                    </button>
                </div> --}}
            </div>
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
@endsection
