<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;

class LocationTranslation extends Model implements ContractsAuditable
{
    use Auditable ,HasFactory , SoftDeletes;
    protected $fillable = [
        'name' , 'locale' , 'location_id'
    ];
}
