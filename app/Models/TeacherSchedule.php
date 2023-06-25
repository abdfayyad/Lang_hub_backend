<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademyTeacher;
class TeacherSchedule extends Model
{
    use HasFactory;
    protected $table = 'teacher_schedule';
    protected $fillable = [
        'day', 'start_time', 'end_time', 'academy_teacher_id'
    ];
    public function academyTeacher()
    {
        return $this->belongsTo(AcademyTeacher::class);
    }
}
