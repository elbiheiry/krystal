<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(Project $project)
    {
        $related_projects = Project::all()->sortByDesc('id')->where('id' , '!=' , $project->id)->where('location_id' , $project->location_id)->take(6);

        return view('site.pages.projects.index' ,compact('project' , 'related_projects'));
    }

    /**
     * Store new request for project
     *
     * @param Request $request
     * @param int $id
     * @return response
     */
    public function store(Request $request , $id)
    {
        $validator = validator($request->all(),[
            'name' => ['required' , 'string' , 'max:255'],
            'phone' => ['required' , 'regex:/(01)[0-9]{8}/'],
            'email' => ['required' , 'email' , 'string' , 'max:255']
        ] , [] , [
            'name' => app()->getLocale() == 'en' ? 'Full name' : 'الإسم بالكامل',
            'phone' => app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف',
            'email' => app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        $request['project_id'] = $id;

        try {
            ProjectRequest::create($request->toArray());

            return response()->json( 
                app()->getLocale() == 'en' ? 'Your message has been sent , we will reply ASAP' : 'تم إرسال رسالتك وسيتم التواصل معك في أقرب وقت ممكن'
                , 200);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return error_response();
        }
    }
}
