<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Group;
use App\Models\Payment;
use App\Models\CreditCard;
class   Student extends Model
{
    use HasFactory;
    protected $table = 'students';//
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'user_id'
    ];
    public function academies(){
        return $this->belongsToMany(Academy::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    //The courses that belong to the Student
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    // The lessons that belong to the Student
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }
    // The groups that belong to the Student
    public function groups(){
        return $this->belongsToMany(Group::class);
    }
    public function offers(){
        return $this->belongsToMany(Offer::class) ;
    }
    public function offerNotifications(){
        return $this->hasMany(OfferNotification::class);
    }
    public function academyNotifications(){
        return $this->hasMany(AcademyNotification::class);
    }
    public function certificates(){
        return $this->hasMany(Certificate::class) ;
    }
    
}
