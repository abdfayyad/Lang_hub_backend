<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferAnnualScadual extends Model
{
    use HasFactory;
    protected $table = 'offer_annual_scaduals';

    protected $fillable = [
        'start_hour', 'end_hour', 'day', 'start_date',
        'end_date', 'offer_id'
    ];
    protected $hidden = [
        'created_at' , 'updated_at' , 'start_date' , 'end_date' ,'id' , 'offer_id'
    ];
    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
