<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferStudent extends Model
{
    protected $table = 'offer_student' ;
    protected $fillable = [
        'student_id' , 'offer_id' , 'approved'
    ];
  
    use HasFactory;
}
