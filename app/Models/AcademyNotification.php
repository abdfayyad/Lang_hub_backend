<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademyNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' , 'academy_id' , 'student_id'
    ];
    public function academy(){
        return $this->belongsTo(Academy::class) ;
    }
    public function students(){
        return $this->belongsToMany(Student::class) ;
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
