<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;

class TypeTranslation extends Model implements ContractsAuditable
{
    use Auditable ,HasFactory ,SoftDeletes;

    protected $fillable = [
        'name' ,'type_id' , 'locale'
    ];
}
