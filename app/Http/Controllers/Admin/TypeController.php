<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeRequest;
use App\Models\Type;
use App\Models\TypeTranslation;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::withTrashed()->orderBy('id' , 'desc')->get();

        return view('admin.pages.types.index' ,compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en
            ],
            'ar' => [
                'name' => $request->name_ar
            ],
            'slug' => SlugService::createSlug(Type::class , 'slug' , $request->name_en , ['unique' => true])
        ];
        try {
            Type::create($data);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.pages.types.edit' ,compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TypeRequest  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest  $request, Type $type)
    {
        $data = [
            'en' => [
                'name' => $request->name_en
            ],
            'ar' => [
                'name' => $request->name_ar
            ]
        ];
        if ($request->name_en != $type->name) {
            $data['slug'] = SlugService::createSlug(Type::class , 'slug' , $request->name_en , ['unique' => true]);
        }
        try {
            $type->update($data);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        // $type->translations()->delete();

        return redirect()->back();
    }

    /**
     * Restore type on softdelete
     *
     * @return response()
     */
    public function restore($id)
    {
        Type::withTrashed()->findOrFail($id)->restore();
        // TypeTranslation::withTrashed()->where('type_id' , $id)->restore();

        return redirect()->back();
    }
}
