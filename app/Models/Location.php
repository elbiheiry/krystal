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

class Location extends Model implements ContractsAuditable ,TranslatableContract
{
    use HasFactory , Sluggable , SoftDeletes , Auditable , Translatable;

    protected $fillable = ['slug' , 'image'];

    public $translatedAttributes = ['name'];

    /**
     * create slug input 
     *
     * @return response
     */
    public function sluggable() :Array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
