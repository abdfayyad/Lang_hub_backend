<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Academy;
class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';

    protected $fillable = [
        'name', 'price', 'hours', 'start_date',
        'end_date', 'description','student_id'
    ];

    public function academy() {
        return $this->belongsTo(Academy::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }

}
