@extends('admin.layouts.master')

@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Project status
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Project status</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <form class="row ajax-form" action="{{ route('admin.statuses.store') }}" method="post">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status (EN)</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status (AR)</label>
                            <input type="text" class="form-control" name="name_ar">
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
                Project status
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
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($statuses as $index => $status)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $status->name }}</td>
                                            <td>
                                                @if ($status->trashed())
                                                    <button class="custom-btn blue-bc restore-btn"
                                                        data-url="{{ route('admin.statuses.restore', ['id' => $status->id]) }}">
                                                        <i class="fas fa-redo"></i> Restore
                                                    </button>
                                                @else
                                                    <button class="custom-btn btn-modal-view"
                                                        data-url="{{ route('admin.statuses.edit', ['status' => $status->id]) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="custom-btn red-bc delete-btn"
                                                        data-url="{{ route('admin.statuses.destroy', ['status' => $status->id]) }}">
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
