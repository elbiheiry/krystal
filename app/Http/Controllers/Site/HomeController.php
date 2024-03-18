<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SearchResult;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public function index()
    {
        if (session()->has('email')) {
            $result = SearchResult::whereEmail(session()->get('email'))->first();
            if ($result) {
                $locations = json_decode($result->locations);
                $types = json_decode($result->types);

                $recommendations = Project::whereIn('location_id' , $locations)->whereHas('types' , function ($query) use ($types){
                    $query->whereIn('type_id' , $types);
                })->orderBy('id' , 'desc')->take(6)->get();
            }else{
                $recommendations = Project::all()->sortByDesc('id')->take(6);    
            }
        }else{
            $recommendations = Project::all()->sortByDesc('id')->take(6);
            
        }
        $featured_projects = Project::all()->sortByDesc('id')->where('home' ,1);
        $projects = Project::all()->sortByDesc('id')->take(6);
        $installments = Project::select('installment')->distinct()->pluck('installment')->toArray();
        $sorted_installments = Arr::sort($installments);
        $down_payments = Project::select('down_payment')->distinct()->pluck('down_payment')->toArray();
        $sorted_down_payments = Arr::sort($down_payments);

        return view('site.pages.index' ,compact('featured_projects' , 'recommendations' , 'projects' , 'sorted_installments' , 'sorted_down_payments'));
    }

    public function search(Request $request)
    {
        $location = $request->location_id;
        $type = $request->type_id;
        $installment = $request->installment;
        $payment = $request->down_payment;

        $projects = Project::select('*');

        if ($location) {
            $projects = $projects->where('location_id' , $location);
        }
        if ($type) {
            $projects = $projects->whereHas('types' , function ($query) use ($type){
                $query->where('type_id' , $type);
            });
        }
        if ($installment) {
            $projects = $projects->where('installment' , $installment);
        }
        if ($payment) {
            $projects = $projects->where('down_payment' , $payment);
        }

        $projects = $projects->orderBy('id' , 'desc')->get();

        return view('site.pages.search' , compact('projects'));
    }
}
