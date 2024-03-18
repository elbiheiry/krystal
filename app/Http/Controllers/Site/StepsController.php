<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SearchResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StepsController extends Controller
{
    public function welcome()
    {
        return view('site.pages.welcome');
    }

    public function first_validation(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'type_ids' => ['required' , 'array' , 'min:1']
        ] , [] ,[
            'type_ids' => app()->getLocale() == 'en' ? 'Investiment type' : 'نوع الإستثمار'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->first() , 400);
        }

        session()->put('type_ids' , $request->type_ids);
        return response()->json(true , 200);
    }

    public function second_validation(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'budget' => ['required']
        ] , [] ,[
            'budget' => app()->getLocale() == 'en' ? 'Allocated budget' : 'الميزاينة المتاحة'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->first() , 400);
        }

        session()->put('budget' , $request->budget);

        return response()->json(true , 200);
    }

    public function third_validation(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'location_ids' => ['required', 'array' , 'min:1']
        ] , [] ,[
            'location_ids' => app()->getLocale() == 'en' ? 'Location' : 'الموقع'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->first() , 400);
        }

        session()->put('location_ids' , $request->location_ids);

        return response()->json(true , 200);
    }

    public function fourth_validation(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'email' => ['required' , 'string' , 'email' , 'max:255']
        ] , [] ,[
            'email' => app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->first() , 400);
        }

        session()->put('email' , $request->email);

        return response()->json(true , 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'type_ids' => ['required' , 'array' , 'min:1'],
            'budget' => ['required'],
            'location_ids' => ['required', 'array' , 'min:1'],
            'email' => ['required' , 'string' , 'email' , 'max:255']
        ] , [] ,[
            'type_ids' => app()->getLocale() == 'en' ? 'Investiment type' : 'نوع الإستثمار',
            'budget' => app()->getLocale() == 'en' ? 'Allocated budget' : 'الميزاينة المتاحة',
            'location_ids' => app()->getLocale() == 'en' ? 'Location' : 'الموقع',
            'email' => app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->first() , 400);
        }

        $result = SearchResult::where('email' , $request->email)->first();
        if ($result) {
            $result->update([
                'types' => json_encode($request->type_ids),
                'locations' => json_encode($request->location_ids),
                'budgets' => $request->budget
            ]);
        }else{
            SearchResult::create([
                'types' => json_encode($request->type_ids),
                'locations' => json_encode($request->location_ids),
                'budgets' => $request->budget,
                'email' => $request->email
            ]);
        }

        return response()->json(route('site.index') , 200);
    }
}
