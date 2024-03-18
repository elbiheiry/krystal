@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Developers
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Developers</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <form method="put" action="{{ route('admin.developers.update', ['developer' => $developer->slug]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <div class="widget">
                <div class="widget-title"> Basic Info </div>
                <div class="widget-content">
                     <div class="row">
                        <div class="col-md-6">
                            <img src="{{ get_image($developer->image, 'developers') }}" width="150">
                   
                            <div class="form-group">
                                <label> image </label>
                                <input type="file" class="jfilestyle" name="image" />
                            </div>
                            <span class="text-danger"> Image dimensions should be : 240 * 150
                            </span>
                        </div>
                        
                       <div class="col-md-6">
                            <div class="form-group">
                                <label> Name (EN)</label>
                                <input type="text" class="form-control" name="name_en"
                                    value="{{ $developer->translate('en')->name }}" />
                            </div>
                            <div class="form-group">
                                <label>Name (AR)</label>
                                <input type="text" class="form-control font_ar" name="name_ar"
                                    value="{{ $developer->translate('ar')->name }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Contact Ifno </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Website </label>
                                <input type="text" class="form-control" name="website"
                                    value="{{ $developer->website }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>  Phone Number </label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ $developer->phone }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Email Address </label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ $developer->email }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Facebook link</label>
                                <input type="url" class="form-control" name="facebook"
                                    value="{{ $developer->facebook }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Twitter link</label>
                                <input type="url" class="form-control" name="twitter"
                                    value="{{ $developer->twitter }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Linkedin link</label>
                                <input type="url" class="form-control" name="linkedin"
                                    value="{{ $developer->linkedin }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Youtube channel link</label>
                                <input type="url" class="form-control" name="youtube"
                                    value="{{ $developer->youtube }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Instagram link</label>
                                <input type="url" class="form-control"
                                    name="instagram"value="{{ $developer->instagram }}" />
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>  Brief (EN)</label>
                              <textarea class="form-control" name="brief_en">{{ $developer->translate('en')->brief }}</textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label> Brief (AR)</label>
                               <textarea class="form-control font_ar" name="brief_ar">{{ $developer->translate('ar')->brief }}</textarea>
                            </div>
                        </div>
                       
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
