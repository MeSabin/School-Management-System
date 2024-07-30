<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubjectToTeachers extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps =false;
    protected $table ='teacher_modules';
}
