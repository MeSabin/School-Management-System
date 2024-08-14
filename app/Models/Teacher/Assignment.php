<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function getDeadlineDateAttribute($value){
        return date('d M Y', strtotime($value));
    }

    public function getDeadlineTimeAttribute($value){
         return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('h:i A');
    }
}
