<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = [
        'exam_id', 'value','choise1','choise2','chois3','choise4','correct_choise'
    ];

    public function exam() {
        return $this->belongsTo(Exam::class);
    }
 
}
