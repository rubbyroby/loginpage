<?php

namespace App\Models;

use App\Models\GrpPlanner;
use App\Models\ProfessorModule;
use App\Models\ProfessorSalary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;

    public function salary(){
        return $this->hasOne(ProfessorSalary::class,'id_professor');
    }

    public function promodules(){
        return $this->hasMany(ProfessorModule::class,'id_professor');
    }

    public function sessions(){
        return $this->hasMany(GrpPlanner::class,'id_professor');
    }
}
