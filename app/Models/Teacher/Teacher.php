<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $guard ='web';
    public $timestamps =false;
    protected $guarded =[];

    public function getemployedAttribute($value){
        return date('d M Y', strtotime($value));
    }
}
