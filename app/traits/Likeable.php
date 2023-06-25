<?php

namespace App\traits;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;
trait Likeable {
	public function likes() { 
        return $this->morphMany(Like::class, 'likeable'); 
    }

	public function like($user = null, $liked = true) {
    	
        return $this->likes()->updateOrCreate([
        	'student_id' => $user->id,
            'likeable_id' => $this->id,
            'likeable_type' => get_class($this),  
        ], [
            
            'liked' => $liked,
        ]);
    }

	public function dislike($user = null) {
        $this->like($user, false);
    }

    public function isLikedBy($user) {
        return (bool) $this->likes->where('user_id', $user->id)->count();
    }

    public function likesCount() {
        return $this->likes()->count();
    }
}
