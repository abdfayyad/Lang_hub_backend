<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Group;
class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'content', 'group_id', 'student_id'
    ];
    // Get the group that owns the Message
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
