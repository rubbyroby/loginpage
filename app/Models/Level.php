<?php

namespace App\Models;

use App\Models\Module;
use App\Models\StudentLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    protected $table = 'levels';

    use HasFactory;

    public function modules(){
        return $this->hasMany(Module::class,'id_level');
    }

    public function groups(){
        return $this->hasMany(Group::class,'id_level');
    }

    public function stdlevel(){
        return $this->hasMany(StudentLevel::class,'id_level');
    }
}
