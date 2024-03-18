<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectSliderRequest;
use App\Models\ProjectSlider;
use Illuminate\Http\Request;

class ProjectSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = ProjectSlider::all()->sortByDesc('id')->where('project_id' , $id);

        return view('admin.pages.projects.slider.index' ,compact('images' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectSliderRequest  $request
     * @param Project $id
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectSliderRequest $request , $id)
    {
        try {
            foreach ($request->images as $image) {
                ProjectSlider::create([
                    'project_id' => $id,
                    'type' => $request->type,
                    'image' => image_manipulate($image , 'projects' , 1200 , 620)
                ]);
            }
            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = ProjectSlider::findOrFail($id);

        return view('admin.pages.projects.slider.edit' ,compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectSliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectSliderRequest $request, $id)
    {
        $image = ProjectSlider::findOrFail($id);
        if ($request->image) {
            image_delete($image->image , 'projects');
            $request['image'] = image_manipulate($image , 'projects' , 1200 , 620);
        }

        try {
            $image->update($request->all());

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProjectSlider::findOrFail($id)->delete();

        return redirect()->back();
    }
}
