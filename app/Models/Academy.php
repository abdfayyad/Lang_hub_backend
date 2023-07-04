<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
use App\Models\AcademyPhoto;
use App\Models\AcademyTeacher;
use App\Models\Course;
use App\Models\FeedBack;
class Academy extends Model
{
    use HasFactory;
    protected $table = 'academies';

    protected $fillable = [
        'name', 'description', 'approved', 'location', 'license_number',
        'adminstrator_id' , 'image'
    ];
    public function rate(){
        return $this->belongsTo(Rate::class);
    }
    public function offers() {
        return $this->hasMany(Offer::class);
    }
    public function photos() {
        return $this->hasMany(AcademyPhoto::class);
    }
    public function courses() {
        return $this->hasMany(Course::class);
    }
    public function teachers() {
        return $this->hasMany(AcademyTeacher::class);
    }
    public function students(){
        return $this->belongsToMany(Student::class);
    }
    public function feedbacks() {
        return $this->hasMany(FeedBack::class);
    }
    public function Notification(){
        return $this->hasOne(AcademyNotification::class) ;
    }
}
