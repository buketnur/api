<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;

class CommentRepository
{
    public function all(Post $post){
        return $post->comments;
    }

    public function find($commentId)
    {
        return Comment::find($commentId);
    }   

    public function create(Post $post, array $data){
        return $post->comments()->create($data);
    }

    public function update(Comment $comment, array $data){
        $comment->update($data);
        return $comment;

    }
}