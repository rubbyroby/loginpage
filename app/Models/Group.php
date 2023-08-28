<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Module;
use App\Models\GrpPlanner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    public function level(){
        return $this->belongsTo(Level::class,'id_level','id');
    }

    public function module(){
        return $this->belongsTo(Module::class,'id_module','id');
    }

    public function sessions(){
        return $this->hasMany(GrpPlanner::class,'id_group');
    }
}
