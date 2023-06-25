<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Academy;
class AcademyStudent extends Model
{
    use HasFactory;
    protected $table = 'academy_student';
    protected $fillable = [
        'academy_id', 'teacher_id', 'enroll_date','approved'
    ];
    public function academy() {
        return $this->belongsTo(Academy::class);
    }
    public function students() {
        return $this->belongsTo(Student::class);
    }
    
}
