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
        'academy_adminstrator_id', 'english', 'french', 'spanish', 'germany'
    ];
    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function photos()
    {
        return $this->hasMany(AcademyPhoto::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    //edit 
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function feedbacks()
    {
        return $this->hasMany(FeedBack::class);
    }
    public function Notification()
    {
        return $this->hasOne(AcademyNotification::class);
    }
    //new modefy 
    public function admin()
    {
        return $this->belongsTo(AcademyAdminstrator::class);
    }
}
