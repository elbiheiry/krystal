@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Projects
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Projects</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                Projects
                <a class="custom-btn" href="{{ route('admin.projects.create') }}">
                    <i class="fa fa-plus"></i> Add project
                </a>
            </div>
            <div class="widget-content">
                <div class="row">
                @php
                    $x = 1;
                @endphp
                @foreach ($projects as $index => $project)
                <div class="col-lg-4 col-md-6">
                    <div class="slide_item">
                        <img src="{{ get_image($project->image, 'projects') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $project->name }}</h3>
                            <br>
                            <div class="w-100 text-center">
                                <a class="custom-btn green-bc"
                                    href="{{ route('admin.projects.slider.index', ['id' => $project->id]) }}">
                                    <i class="fa fa-image"></i> Slideshow
                                </a>
                                @if ($project->trashed())
                                    <button class="custom-btn blue-bc restore-btn"
                                        data-url="{{ route('admin.projects.restore', ['id' => $project->id]) }}">
                                        <i class="fas fa-redo"></i> Restore
                                    </button>
                                @else
                                    <a class="custom-btn"
                                        href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="icon-btn red-bc delete-btn"
                                        data-url="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                        style="margin-left:5px;">
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
