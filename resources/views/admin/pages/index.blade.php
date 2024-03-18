@extends('admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-list"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Project::count() }}" data-speed="1500">
                                            {{ \App\Models\Project::count() }}
                                        </h3>
                                        <div class="count-name">Projects</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-map-marker"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Location::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Location::count() }}
                                        </h3>
                                        <div class="count-name">Locations</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-info"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Type::count() }}" data-speed="1500">
                                            {{ \App\Models\Type::count() }}
                                        </h3>
                                        <div class="count-name">Types</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-building"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Developer::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Developer::count() }}
                                        </h3>
                                        <div class="count-name">Developers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
