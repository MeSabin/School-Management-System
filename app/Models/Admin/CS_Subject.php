<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CS_Subject extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps =false;
    protected $table ='cs_subjects';

}
