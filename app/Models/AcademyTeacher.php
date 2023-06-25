<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Academy;

class AcademyTeacher extends Model
{
    use HasFactory;
    protected $table = 'academy_teacher';
    protected $fillable = [
        'academy_id', 'teacher_id', 'approved'
    ];

    public function academy() {
        return $this->belongsTo(Academy::class);
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function schedules()
    {
        return $this->hasMany(TeacherSchedule::class);
    }
}
