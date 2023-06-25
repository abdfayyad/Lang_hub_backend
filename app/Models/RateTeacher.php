<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateTeacher extends Model
{
    use HasFactory;
    protected $table = 'rate_teacher' ;
    protected $fillable=[
        'rate' , 'teacher_id' , 'student_id'
    ];
    

}
