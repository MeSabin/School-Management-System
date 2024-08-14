<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SubmitAssignment extends Model
{
    use HasFactory;
    protected $table = 'submit_assignments';
    protected $guarded =[];
    public $timestamps =false;

    public function getSubmittedOnAttribute($value){
        return Carbon::parse($value)->format('d M Y h:i:A');
    }

}
