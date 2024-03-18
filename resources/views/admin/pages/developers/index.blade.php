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
        <div class="widget">
            <div class="widget-title">
                Developers
                <a class="custom-btn" href="{{ route('admin.developers.create') }}">
                    <i class="fa fa-plus"></i> Add developer
                </a>
            </div>
            <div class="widget-content">
                 <div class="row">
                @php
                    $x = 1;
                @endphp
                @foreach ($developers as $index => $developer)
               
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                          <div class="slide_item">
                        <img src="{{ get_image($developer->image, 'developers') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $developer->name }}</h3>
                            
                            <p>{{ $developer->projects->count() }} Project</p>
                            <div class="w-100 text-center">
                                @if ($developer->trashed())
                                    <button class="custom-btn blue-bc restore-btn"
                                        data-url="{{ route('admin.developers.restore', ['id' => $developer->id]) }}">
                                        <i class="fas fa-redo"></i> Restore
                                    </button>
                                @else
                                    <a class="custom-btn"
                                        href="{{ route('admin.developers.edit', ['developer' => $developer->slug]) }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="red-bc delete-btn icon-btn"
                                        data-url="{{ route('admin.developers.destroy', ['developer' => $developer->slug]) }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                
                    @php
                        $x++;
                    @endphp
                @endforeach
</div>
                  
            </div>
        </div>

    </div>
    <!--End Page content-->
@endsection
