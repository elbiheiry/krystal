<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Project extends Model implements ContractsAuditable ,TranslatableContract
{
    use HasFactory , Sluggable , SoftDeletes ,Auditable , Translatable;

    protected $with = ['status'];


    protected $fillable = [
        'slug' , 'image' , 'location_id' , 'developer_id' , 'status_id',
        'project_area' , 'installment' ,'down_payment', 'delivery' ,
        'home' , 'developer' , 'location' , 'type', 'map'
    ];

    public $translatedAttributes = ['name' , 'about' , 'facilities' , 'area' ,'payments'];

    /**
     * create slug input 
     *
     * @return response
     */
    public function sluggable() :Array
    {
        return [
            'slug' => [
                'source' => 'name_en'
            ]
        ];
    }

    public function status()
    {
        return $this->belongsTo(Status::class , 'status_id')->withTrashed();
    }

    public function requests()
    {
        return $this->hasMany(ProjectRequest::class);
    }

    public function location_relation()
    {
        return $this->belongsTo(Location::class , 'location_id')->withTrashed();
    }

    public function developer_relation()
    {
        return $this->belongsTo(Developer::class, 'developer_id')->withTrashed();
    }

    public function images()
    {
        return $this->hasMany(ProjectSlider::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class , 'project_types');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
