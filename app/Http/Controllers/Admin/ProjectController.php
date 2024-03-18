<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Developer;
use App\Models\Location;
use App\Models\Project;
use App\Models\ProjectTranslation;
use App\Models\Status;
use App\Models\Type;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::withTrashed()->orderBy('id' ,'desc')->get();

        return view('admin.pages.projects.index' ,compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $developers = Developer::all()->sortByDesc('id');
        $types = Type::all()->sortByDesc('id');
        $locations = Location::all()->sortByDesc('id');
        $statuses = Status::all()->sortByDesc('id');

        return view('admin.pages.projects.create' ,compact('developers' , 'types' , 'locations' , 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'facilities' => $request->facilities_en,
                'about' => $request->about_en,
                'area' => $request->area_en,
                'payments' => $request->payments_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'facilities' => $request->facilities_ar,
                'about' => $request->about_ar,
                'area' => $request->area_ar,
                'payments' => $request->payments_ar
            ],
            'image' => image_manipulate($request->image , 'projects' , 1200 , 620),
            'slug' => SlugService::createSlug(Project::class , 'slug' , $request->name_en , ['unique' => true]),
            'developer_id' => $request->developer_id,
            'location_id' => $request->location_id,
            'status_id' => $request->status_id,
            'project_area' => $request->project_area,
            'installment' => $request->installment,
            'down_payment' => $request->down_payment,
            'delivery' => $request->delivery,
            'home' => $request->home,
            'developer' => $request->developer,
            'location' => $request->location,
            'type' => $request->type,
            'map' => $request->map
        ];

        try {
            $project = Project::create($data);

            $project->types()->attach($request->type_id);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $developers = Developer::all()->sortByDesc('id');
        $types = Type::all()->sortByDesc('id');
        $locations = Location::all()->sortByDesc('id');
        $statuses = Status::all()->sortByDesc('id');

        return view('admin.pages.projects.edit' ,compact('developers' , 'types' , 'locations' ,'project' , 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectRequest $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'facilities' => $request->facilities_en,
                'about' => $request->about_en,
                'area' => $request->area_en,
                'payments' => $request->payments_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'facilities' => $request->facilities_ar,
                'about' => $request->about_ar,
                'area' => $request->area_ar,
                'payments' => $request->payments_ar
            ],
            'developer_id' => $request->developer_id,
            'location_id' => $request->location_id,
            'status_id' => $request->status_id,
            'project_area' => $request->project_area,
            'installment' => $request->installment,
            'down_payment' => $request->down_payment,
            'delivery' => $request->delivery,
            'home' => $request->home,
            'developer' => $request->developer,
            'location' => $request->location,
            'type' => $request->type,
            'map' => $request->map
        ];

        if ($request->name_en != $project->name) {
            $data['slug'] = SlugService::createSlug(Project::class , 'slug' , $request->name_en , ['unique' => true]);
        }
        if ($request->image) {
            image_delete($project->image , 'projects');
            $data['image'] = image_manipulate($request->image , 'projects' , 1200 , 620);
        }

        try {
            $project->update($data);

            $project->types()->sync($request->type_id);

            // return update_response();
            return response()->json([
                'message' => 'Data has been updated successfully',
                'url' => route('admin.projects.edit' , ['project' => $project->slug])
            ], 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        // $project->translations()->delete();

        return redirect()->back();
    }

    /**
     * Restore developer on softdelete
     *
     * @return response()
     */
    public function restore($id)
    {
        Project::withTrashed()->findOrFail($id)->restore();
        // ProjectTranslation::withTrashed()->where('project_id' , $id)->restore();

        return redirect()->back();
    }
}
