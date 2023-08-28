<?php

namespace App\Models;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfessorSalary extends Model
{
    use HasFactory;

    public function professor(){
        return $this->belongsTo(Professor::class,'id_professor','id');
    }
}
