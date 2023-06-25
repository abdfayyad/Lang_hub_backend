<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class OfferNotification extends Model
{
    protected $fillable = [
        'title' , 'offer_id' , 'student_id'
    ];
    use HasFactory;
    public function students(){
        return $this->belongsToMany(Student::class) ;
    }
    public function offer(){
        return $this->belongsTo(Offer::class) ;
    }
    public function student(){
        return $this->belongsTon(Student::class);
    }
}
