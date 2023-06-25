<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    protected $fillable = [
        'course_id'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
