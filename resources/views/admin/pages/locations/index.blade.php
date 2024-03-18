@extends('admin.layouts.master')

@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Locations
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Locations</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <form class="row ajax-form" action="{{ route('admin.locations.store') }}" method="post">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Location name (EN)</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Location name (AR)</label>
                            <input type="text" class="form-control" name="name_ar">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Location image </label>
                            <input type="file" class="jfilestyle" name="image" />
                        </div>
                        <span class="text-danger">Image dimensions should be : 280 * 140
                        </span>
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
                Locations
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name </th>
                                        <th>projects </th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($locations as $index => $location)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $location->name }}</td>
                                            <td>{{ $location->projects->count() }}</td>
                                            <td>

                                                @if ($location->trashed())
                                                    <button class="custom-btn blue-bc restore-btn"
                                                        data-url="{{ route('admin.locations.restore', ['id' => $location->id]) }}">
                                                        <i class="fas fa-redo"></i> Restore
                                                    </button>
                                                @else
                                                    <button class="custom-btn btn-modal-view"
                                                        data-url="{{ route('admin.locations.edit', ['location' => $location->slug]) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="custom-btn red-bc delete-btn"
                                                        data-url="{{ route('admin.locations.destroy', ['location' => $location->slug]) }}">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                @endif

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
