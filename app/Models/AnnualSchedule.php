<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class AnnualSchedule extends Model
{
    use HasFactory;
    protected $table = 'annual_schedules';

    protected $fillable = [
        'start_hour', 'end_hour', 'day', 'start_date',
        'end_date', 'course_id'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
