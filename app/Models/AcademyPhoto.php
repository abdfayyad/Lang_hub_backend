<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Academy;
class AcademyPhoto extends Model
{
    use HasFactory;
    protected $table = 'academy_photos';
    protected $fillable = [
        'image', 'academy_pending_id'
    ];

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
}
