@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Add Developer
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Add Developer</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <form method="post" action="{{ route('admin.developers.store') }}" class="ajax-form">
            @csrf
            @method('post')
            <div class="widget">
                <div class="widget-title"> Basic Info </div>
                <div class="widget-content">
                  <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-group">
                            <label>developer image </label>
                            <input type="file" class="jfilestyle" name="image" />
                        </div>
                        <span class="text-danger">Image dimensions should be : 240 * 150
                        </span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Name (EN)</label>
                            <input type="text" class="form-control" name="name_en" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>  Name (AR)</label>
                            <input type="text" class="form-control font_ar" name="name_ar" />
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="widget">
                <div class="widget-title"> Contact Info </div>
                <div class="widget-content">
                  <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> Website </label>
                                <input type="text" class="form-control" name="website" />
                            </div>
                        </div>
                       <div class="col-6">
                           <div class="form-group">
                                <label> Phone Number </label>
                                <input type="text" class="form-control" name="phone" />
                            </div>
                        </div>
                       <div class="col-6">
                            <div class="form-group">
                                <label> Email Address </label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                        </div>
                       <div class="col-6">
                           <div class="form-group">
                                <label> Facebook link</label>
                                <input type="url" class="form-control" name="facebook" />
                            </div>
                       </div>
                       <div class="col-6">
                      
                            <div class="form-group">
                                <label> Twitter link</label>
                                <input type="url" class="form-control" name="twitter" />
                            </div>
                        </div>
                       <div class="col-6">
                      
                            <div class="form-group">
                                <label> Linkedin link</label>
                                <input type="url" class="form-control" name="linkedin" />
                            </div>
                        </div>
                       <div class="col-6">
                      
                            <div class="form-group">
                                <label> Youtube channel link</label>
                                <input type="url" class="form-control" name="youtube" />
                            </div>
                        </div>
                       <div class="col-6">
                       
                            <div class="form-group">
                                <label> Instagram link</label>
                                <input type="url" class="form-control" name="instagram" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="widget">
                <div class="widget-title"> Developer Brief </div>
                <div class="widget-content">
                     <div class="row">
                         <div class="col-12">
                                <span class="text-danger">
                                    Press [ Enter Button ] to make new line
                            </span>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>  Brief (EN)</label>
                                    <textarea class="form-control" name="brief_en"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label> Brief (AR)</label>
                                    <textarea class="form-control font_ar" name="brief_ar"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
            <button class="custom-btn" type="submit">
                Save Change <i class="fa fa-long-arrow-alt-right"></i>
             </button>
     </form>
        
        
        
    </div>
    <!--End Page content-->
@endsection
