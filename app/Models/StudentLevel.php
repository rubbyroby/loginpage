<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentLevel extends Model
{
    use HasFactory;

    public function level(){
        return $this->belongsTo(Level::class,'id_level','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'id_student','id');
    }
}
