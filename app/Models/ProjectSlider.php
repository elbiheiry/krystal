<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;

class ProjectSlider extends Model implements ContractsAuditable 
{
    use HasFactory,Auditable;
    protected $fillable = [
        'image' , 'type' , 'project_id'
    ];

    public function delete()
    {
        image_delete($this->image , 'projects');

        return parent::delete();
    }
}
