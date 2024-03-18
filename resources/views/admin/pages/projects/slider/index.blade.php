@extends('admin.layouts.master')

@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Project slider
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Project slider</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <form class="row ajax-form" action="{{ route('admin.projects.slider.store', ['id' => $id]) }}"
                    method="post">
                    @csrf
                    <div class="col-6">
                        <div class="form-group">
                            <label>project images </label>
                            <input type="file" class="jfilestyle" name="images[]" multiple />
                        </div>
                        <span class="text-danger">Image dimensions should be : 1200 * 620
                        </span>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Slider type</label>
                            <select class="form-control" name="type">
                                <option value="0">Choose type</option>
                                <option value="main">Main slider</option>
                                <option value="structure">Structure slider</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 form-group text-center">
                        <button class="custom-btn green-bc" type="submit">
                            <i class="fa fa-plus"></i> Save change
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget">
            <div class="widget-title">
                Project images
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image </th>
                                        <th>Image </th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($images as $index => $image)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td><img src="{{ get_image($image->image, 'projects') }}" width="150"></td>
                                            <td>{{ $image->type == 'main' ? 'Main slider' : 'Structure slider' }}</td>
                                            <td>
                                                <button class="custom-btn btn-modal-view"
                                                    data-url="{{ route('admin.projects.slider.edit', ['id' => $image->id]) }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button class="custom-btn red-bc delete-btn"
                                                    data-url="{{ route('admin.projects.slider.destroy', ['id' => $image->id]) }}">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>

                                            </td>
                                        </tr>
                                        @php
                                            $x++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Page content-->
@endsection
