<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;

class SearchResult extends Model implements ContractsAuditable
{
    use HasFactory , Auditable;

    protected $fillable = [
        'email' , 'locations' , 'types' , 'budgets'
    ];
}
