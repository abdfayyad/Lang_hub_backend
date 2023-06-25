<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use App\traits\Commentable;
use App\traits\Likeable;
class Lesson extends Model
{
    use HasFactory, Commentable, Likeable;
    protected $table = 'lessons';
    protected $fillable = [
        'name','title1', 'course_id','title2','title3','title4','title5','title6'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function notification(){
        return $this->hasOne(LessonNotification::class) ;
    }

  
}
