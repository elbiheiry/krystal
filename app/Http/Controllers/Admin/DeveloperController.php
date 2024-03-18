<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeveloperRequest;
use App\Models\Developer;
use App\Models\DeveloperTranslation;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::withTrashed()->orderBy('id' , 'desc')->get();

        return view('admin.pages.developers.index' ,compact('developers'));
    }

    public function create()
    {
        return view('admin.pages.developers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DeveloperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeveloperRequest $request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'brief' => $request->brief_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'brief' => $request->brief_ar
            ],
            'slug' => SlugService::createSlug(developer::class , 'slug' , $request->name_en , ['unique' => true]),
            'image' => image_manipulate($request->image , 'developers' , 240 , 150),
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram
        ];
        try {
            Developer::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        return view('admin.pages.developers.edit' ,compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DeveloperRequest  $request
     * @param  developer $developer
     * @return \Illuminate\Http\Response
     */
    public function update(DeveloperRequest  $request, Developer $developer)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'brief' => $request->brief_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'brief' => $request->brief_ar
            ],
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram
        ];
        if ($request->name_en != $developer->name) {
            $data['slug'] = SlugService::createSlug(Developer::class , 'slug' , $request->name_en , ['unique' => true]);
        }
        if ($request->image) {
            image_delete($developer->image , 'developers');
            $data['image'] = image_manipulate($request->image , 'developers' , 240 , 150);
        }
        try {
            $developer->update($data);

            return response()->json([
                'message' => 'Data has been updated successfully',
                'url' => route('admin.developers.edit' , ['developer' => $developer->slug])
            ], 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();
        // $developer->translations()->delete();

        return redirect()->back();
    }

    /**
     * Restore developer on softdelete
     *
     * @return response()
     */
    public function restore($id)
    {
        Developer::withTrashed()->findOrFail($id)->restore();
        // DeveloperTranslation::withTrashed()->where('developer_id' , $id)->restore();

        return redirect()->back();
    }
}
