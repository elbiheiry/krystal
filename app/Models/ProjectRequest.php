<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;

class ProjectRequest extends Model implements ContractsAuditable 
{
    use Auditable ,HasFactory;

    protected $fillable = [
        'name' , 'phone' , 'email' , 'project_id'
    ];
}
