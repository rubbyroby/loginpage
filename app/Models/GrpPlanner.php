<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Classroom;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrpPlanner extends Model
{
    use HasFactory;

    public function professor(){
        return $this->belongsTo(Professor::class,'id_professor','id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'id_group','id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'id_classroom','id');
    }
}
