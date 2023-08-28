<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfessorModule extends Model
{
    use HasFactory;

    public function professor(){
        return $this->belongsTo(Professor::class,'id_professor','id');
    }

    public function module(){
        return $this->belongsTo(Module::class,'id_module','id');
    }
}
