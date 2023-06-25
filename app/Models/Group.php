<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Student;
class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'name', 'public', 'teacher_id'
    ];
    // Get the teacher that owns the Group
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    // The students that belong to the Group
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    // Get all of the messages for the Group
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    
}
