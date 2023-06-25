<?php

namespace App\traits;
use App\Models\Comment;

trait Commentable {
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function addComment($body, $user = null)
    {
        return $this->comments()->create([
            'body' => $body,
            'student_id' => $user->id,
            'commentable_id' => $this->id,
            'commentable_type' => get_class($this)
        ]);
    }

    /*public function addComment($body, $user = null)
    {
        $comment = new Comment([
            'body' => $body,
            'student_id' => $user->id,
            'commentable_id' => $this->id,
            'commentable_type' => get_class($this)
        ]);

        $this->comments()->save($comment);
    }*/

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
    }
}
