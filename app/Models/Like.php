<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = [
        'liked', 'likeable_id', 'likeable_type', 'student_id'
    ];
    public function likeable()
    {
        return $this->morphTo();
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
