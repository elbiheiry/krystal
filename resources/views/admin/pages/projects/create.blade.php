@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        ADD project
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">ADD project</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">


        <form method="post" action="{{ route('admin.projects.store') }}" class="ajax-form">
            @csrf
            @method('post')
            <div class="widget">
                <div class="widget-title"> Basic Info </div>
                <div class="widget-content">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>project image </label>
                                <input type="file" class="jfilestyle" name="image" />
                            </div>
                            <span class="text-danger">Image dimensions should be : 1200 * 620
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Name ( EN ) </label>
                                <input type="text" class="form-control" name="name_en" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Name ( AR ) </label>
                                <input type="text" class="form-control font_ar" name="name_ar" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Details </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Developer</label>
                                <select class="form-control" name="developer_id">
                                    <option value="0">Choose</option>
                                    @foreach ($developers as $developer)
                                        <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Location</label>
                                <select class="form-control" name="location_id">
                                    <option value="0">Choose</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Status</label>
                                <select class="form-control" name="status_id">
                                    <option value="0">Choose</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Type</label>
                                <select class="form-control" id="select" name="type_id[]" multiple>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label> Area ( M2) </label>
                                <input type="text" class="form-control" name="project_area" placeholder="EX: 240 M2" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>installment ( Year ) </label>
                                <input type="text" class="form-control" name="installment" placeholder="EX: 5 Year" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Down Payment ( % )</label>
                                <input type="text" class="form-control" name="down_payment" placeholder="EX: 10% " />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label> Delivery Time</label>
                                <input type="text" class="form-control" name="delivery" placeholder="EX: 2025" />
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="text-danger">
                                Please enter only the number without the coding mark
                            </span>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Map </label>
                                <input type="text" class="form-control" name="map" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Featured Setting </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in home page </label>
                            <div class="radio-wrap">
                                <input id="home-1" type="radio" name="home" value="1">
                                <label for="home-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="home-2" type="radio" name="home" value="0">
                                <label for="home-2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in developers page </label>
                            <div class="radio-wrap">
                                <input id="developer-1" type="radio" name="developer" value="1">
                                <label for="developer-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="developer-2" type="radio" name="developer" value="0">
                                <label for="developer-2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in locations page </label>
                            <div class="radio-wrap">
                                <input id="location-1" type="radio" name="location" value="1">
                                <label for="location-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="location-2" type="radio" name="location" value="0">
                                <label for="location-2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in project type page </label>
                            <div class="radio-wrap">
                                <input id="type-1" type="radio" name="type" value="1">
                                <label for="type-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="type-2" type="radio" name="type" value="0">
                                <label for="type-2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Facilities </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Facilities (EN)</label>
                                <textarea class="form-control tags" name="facilities_en"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Facilities (AR)</label>
                                <textarea class="form-control tags font_ar" name="facilities_ar"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Brief </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-12">
                            <span class="text-danger">
                                Press [ Enter Button ] to make new line
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label> Brief ( EN ) </label>
                                <textarea class="form-control" name="about_en"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Brief ( AR ) </label>
                                <textarea class="form-control font_ar" name="about_ar"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> AREAS </div>
                <div class="widget-content">
                    <div class="form-group">

                        <label> Areas ( EN ) </label>
                        <input type="text" class="form-control" name="area_en" />
                    </div>

                    <div class="form-group">
                        <label> Areas ( AR ) </label>
                        <input type="text" class="form-control font_ar" name="area_ar" />
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Payment </div>
                <div class="widget-content">
                    <div class="form-group">

                        <label> Payment ( EN ) </label>
                        <input type="text" class="form-control" name="payments_en" />
                    </div>

                    <div class="form-group">
                        <label> Payment ( AR ) </label>
                        <input type="text" class="form-control font_ar" name="payments_ar" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="custom-btn" type="submit">
                    Save Change <i class="fa fa-long-arrow-alt-right"></i>
                </button>
            </div>

        </form>

    </div>
    <!--End Page content-->
@endsection
