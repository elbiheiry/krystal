<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationRequest;
use App\Models\Location;
use App\Models\LocationTranslation;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::withTrashed()->orderBy('id' , 'desc')->get();

        return view('admin.pages.locations.index' ,compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en
            ],
            'ar' => [
                'name' => $request->name_ar
            ],
            'image' => image_manipulate($request->image , 'locations' , 280 , 140),
            'slug' => SlugService::createSlug(Location::class , 'slug' , $request->name_en , ['unique' => true])
        ];
        try {
            Location::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('admin.pages.locations.edit' ,compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LocationRequest  $request
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, Location $location)
    {
        $data = [
            'en' => [
                'name' => $request->name_en
            ],
            'ar' => [
                'name' => $request->name_ar
            ]
        ];
        if ($request->name_en != $location->name) {
            $data['slug'] = SlugService::createSlug(Location::class , 'slug' , $request->name_en , ['unique' => true]);
        }
        
        if ($request->image) {
            image_delete($location->image , 'locations');
            $data['image'] = image_manipulate($request->image , 'locations' , 280 , 140);
        }

        try {
            $location->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        // $location->translations()->delete();

        return redirect()->back();
    }

    /**
     * Restore location on softdelete
     *
     * @return response()
     */
    public function restore($id)
    {
        Location::withTrashed()->findOrFail($id)->restore();
        // LocationTranslation::withTrashed()->where('location_id' , $id)->restore();

        return redirect()->back();
    }
}
