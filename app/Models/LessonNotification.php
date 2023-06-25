<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonNotification extends Model
{
    use HasFactory;
    protected $table = 'lesson_notifications';
    protected $fillable = [
        'title' , 'lesson_id'
    ];
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
