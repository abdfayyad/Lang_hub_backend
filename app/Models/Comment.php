<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'body', 'commentable_id', 'commentable_type', 'student_id'
    ];
    public function commentable()
    {
        return $this->morphTo();
    }
    public function student() {
        return $this->belongsTo(Student::class);
    }
    
}
