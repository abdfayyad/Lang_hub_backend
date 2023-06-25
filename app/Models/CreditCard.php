<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class CreditCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number', 'amount', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
