<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::withTrashed()->orderBy('id' , 'desc')->get();

        return view('admin.pages.statuses.index' ,compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en
            ],
            'ar' => [
                'name' => $request->name_ar
            ],
        ];
        try {
            Status::create($data);

            return add_response();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('admin.pages.statuses.edit' ,compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StatusRequest  $request
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest  $request, Status $status)
    {
        $data = [
            'en' => [
                'name' => $request->name_en
            ],
            'ar' => [
                'name' => $request->name_ar
            ]
        ];
        try {
            $status->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
        // $status->translations()->delete();

        return redirect()->back();
    }

    /**
     * Restore status on softdelete
     *
     * @return response()
     */
    public function restore($id)
    {
        Status::withTrashed()->findOrFail($id)->restore();
        // statusTranslation::withTrashed()->where('status_id' , $id)->restore();

        return redirect()->back();
    }
}
