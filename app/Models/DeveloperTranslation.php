<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;

class DeveloperTranslation extends Model implements ContractsAuditable
{
    use HasFactory, SoftDeletes ,Auditable;

    protected $fillable = ['name' , 'brief' , 'locale' , 'developer_id'];
}
