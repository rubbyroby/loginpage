<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;


    public function level(){
        return $this->belongsTo(Level::class,'id_level','id');
    }

    public function promodules(){
        return $this->hasMany(ProfessorModule::class,'id_module');
    }

    public function groups(){
        return $this->hasMany(Group::class,'id_module');
    }
}
