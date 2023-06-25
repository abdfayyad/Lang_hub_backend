<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\SuperAdmin;
use App\Models\AcademyAdminstrator;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role() {
        return $this->belongsTo(Role::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
    public function teachers() {
        return $this->hasMany(Teacher::class);
    }
    public function superAdmin() {
        return $this->hasOne(SuperAdmin::class);
    }
    public function academyAdmin() {
        return $this->hasMany(AcademyAdminstrator::class);
    }
}
