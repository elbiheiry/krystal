@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        projects
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">projects</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <form method="put" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}"
            class="ajax-form">
            @csrf
            @method('put')
      
           <div class="widget">
              <div class="widget-title"> Basic Info </div>
                  <div class="widget-content">
                     <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                 <img src="{{ get_image($project->image, 'projects') }}" width="150">
                      
                           
                                <label>project image </label>
                                <input type="file" class="jfilestyle" name="image" />
                            </div>
                            <span class="text-danger">Image dimensions should be : 1200 * 620
                            </span>
                        </div>
                  
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Name ( EN ) </label>
                                 <input type="text" class="form-control" name="name_en" placeholder="project name (EN)"
                                    value="{{ $project->translate('en')->name }}" />
                            </div>
                      
                            <div class="form-group">
                                   <label> Name ( AR ) </label>
                                 <input type="text" class="form-control font_ar" name="name_ar"
                                    placeholder="project name (AR)" value="{{ $project->translate('ar')->name }}" />
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
                                        <option value="{{ $developer->id }}"
                                            {{ $developer->id == $project->developer_id ? 'selected' : '' }}>
                                            {{ $developer->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                          </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Location</label>
                                     <select class="form-control" name="location_id">
                                    <option value="0">Choose </option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ $location->id == $project->location_id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
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
                                        <option value="{{ $status->id }}"
                                            {{ $project->status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label> Type</label>
                                    <select class="form-control" id="select" name="type_id[]" multiple>
                                    <option value="0">Choose type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $project->types->contains($type->id) ? 'selected' : '' }}>
                                            {{ $type->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label> Area ( M2) </label>
                                     <input type="text" class="form-control" name="project_area" placeholder="project area"
                                    value="{{ $project->project_area }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                     <label>installment ( Year ) </label>
                                     <input type="text" class="form-control" name="installment"
                                    placeholder="project installment" value="{{ $project->installment }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                     <label>Down Payment ( % )</label>
                                   <input type="text" class="form-control" name="down_payment"
                                    placeholder="project down payment" value="{{ $project->down_payment }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                     <label> Delivery Time</label>
                                    <input type="text" class="form-control" name="delivery" placeholder="project delivery"
                                    value="{{ $project->delivery }}" />
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
                                    <input type="text" class="form-control" name="map" placeholder="project map"
                                    value="{{ $project->map }}" />
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
                                <input id="home-1" type="radio" name="home" value="1"
                                    {{ $project->home == 1 ? 'checked' : '' }}>
                                <label for="home-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="home-2" type="radio" name="home" value="0"
                                    {{ $project->home == 0 ? 'checked' : '' }}>
                                <label for="home-2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in developers page </label>
                            <div class="radio-wrap">
                                <input id="developer-1" type="radio" name="developer" value="1"
                                    {{ $project->developer == 1 ? 'checked' : '' }}>
                                <label for="developer-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="developer-2" type="radio" name="developer" value="0"
                                    {{ $project->developer == 0 ? 'checked' : '' }}>
                                <label for="developer-2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in locations page </label>
                            <div class="radio-wrap">
                                <input id="location-1" type="radio" name="location" value="1"
                                    {{ $project->location == 1 ? 'checked' : '' }}>
                                <label for="location-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="location-2" type="radio" name="location" value="0"
                                    {{ $project->location == 0 ? 'checked' : '' }}>
                                <label for="location-2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>Featured in project type page </label>
                            <div class="radio-wrap">
                                <input id="type-1" type="radio" name="type" value="1"
                                    {{ $project->type == 1 ? 'checked' : '' }}>
                                <label for="type-1">
                                    Yes
                                </label>
                            </div>
                            <!--End form-group-->
                            <div class="radio-wrap">
                                <input id="type-2" type="radio" name="type" value="0"
                                    {{ $project->type == 0 ? 'checked' : '' }}>
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
                                 <textarea class="form-control tags" name="facilities_en" placeholder="project facilities (EN)">{{ $project->translate('en')->facilities }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Facilities (AR)</label>
                                 <textarea class="form-control tags font_ar" name="facilities_ar" placeholder="project facilities (AR)">{{ $project->translate('ar')->facilities }}</textarea>
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
                                 <textarea class="form-control" name="about_en" placeholder="project brief (EN)">{{ $project->translate('en')->about }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Brief ( AR ) </label>
                                 <textarea class="form-control font_ar" name="about_ar" placeholder="project brief (AR)">{{ $project->translate('ar')->about }}</textarea>
                            </div>
                        </div>
                       </div>
                  </div>
             </div>  
             <div class="widget">
                  <div class="widget-title"> AREAS  </div>
                  <div class="widget-content">               
                        <div class="form-group">
                            
                            <label> Areas ( EN ) </label>
                             <input type="text" class="form-control" name="area_en"
                                    placeholder="project areas (EN)" value="{{ $project->translate('en')->area }}" />
                        </div>
                 
                        <div class="form-group">
                            <label> Areas ( AR ) </label>
                           <input type="text" class="form-control font_ar" name="area_ar"
                                    placeholder="project areas (AR)" value="{{ $project->translate('ar')->area }}" />
                        </div>
                    </div>
                  </div>
            <div class="widget">
                  <div class="widget-title"> Payment  </div>
                  <div class="widget-content">               
                        <div class="form-group">
                            
                            <label> Payment ( EN ) </label>
                             <input type="text" class="form-control" name="payments_en"
                                    placeholder="project payments (EN)"
                                    value="{{ $project->translate('en')->payments }}" />
                        </div>
                 
                        <div class="form-group">
                            <label> Payment ( AR ) </label>
                             <input type="text" class="form-control font_ar" name="payments_ar"
                                    placeholder="project payments (AR)"
                                    value="{{ $project->translate('ar')->payments }}" />
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
