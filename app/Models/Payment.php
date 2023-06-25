<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'student_id', 'course_id'
    ];
    // Get the course that owns the Payment
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
