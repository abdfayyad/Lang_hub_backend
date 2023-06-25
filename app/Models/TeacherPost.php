<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
class TeacherPost extends Model
{
    use HasFactory;
    protected $table = 'teacher_posts';
    protected $fillable = [
        'title', 'image', 'teacher_id'
    ];

    public function user()
    {
        return $this->belongsTo(Teacher::class);
    }
}
