<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class AcademyAdminstrator extends Model
{
    use HasFactory;
    protected $table = 'academy_adminstrators';
    protected $fillable = [
        'first_name', 'user_id' , 'last_name' , 'phone_number' , 'photo' 
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function AcademyPending(){
        return $this->hasOne(AcademyPending::class) ;
    }
    //new modefy 
    public function academy(){
        return $this->hasMany(Academy::class);
    }
}
