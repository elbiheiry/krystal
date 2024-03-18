<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Project;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Location $location)
    {
        $featured_projects = Project::all()->where('location_id' , $location->id)->where('location' , 1)->sortByDesc('id');
        $projects = Project::all()->where('location_id' , $location->id)->sortByDesc('id');

        return view('site.pages.locations.index' ,compact('location' , 'featured_projects' , 'projects'));
    }
}
