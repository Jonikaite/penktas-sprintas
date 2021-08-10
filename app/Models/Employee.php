<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    public $fillable = ['name', 'project_id'];

    public function projects(){
        return $this->belongsTo('App\Models\Project');
    }

}