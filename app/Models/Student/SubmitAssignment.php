<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitAssignment extends Model
{
    use HasFactory;
    protected $table = 'submit_assignments';
    protected $guarded =[];
    public $timestamps =false;
}
