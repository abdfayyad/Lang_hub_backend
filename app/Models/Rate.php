<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'rate' , 'num_of_rates' 
    ] ;
    protected $hidden = [
        'id' , 'num_of_rates' , 'created_at' , 'updated_at'
    ];
    public function academy(){
        return $this->hasOne(Academy::class) ;
    }
    public function course(){
        return $this->hasOne(Course::class) ;
    }
    public function teacher() {
        return $this->hasOne(Teacher::class);
    }
}
