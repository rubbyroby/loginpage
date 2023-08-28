<?php

namespace App\Models;

use App\Models\GrpPlanner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    public function sessions(){
        return $this->hasMany(GrpPlanner::class,'id_classroom');
    }
}
