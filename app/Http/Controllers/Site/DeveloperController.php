<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * show all developers page
     *
     * @return view
     */
    public function index()
    {
        $developers = Developer::all()->sortByDesc('id');

        return view('site.pages.developers.index' ,compact('developers'));
    }

    /**
     * Show developer page
     *
     * @param Developer $developer
     * @return view
     */
    public function show(Developer $developer)
    {
        return view('site.pages.developers.show' , compact('developer'));
    }
}
