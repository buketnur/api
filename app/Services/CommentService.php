<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;

class CommentService{

    protected $postRepository;
    protected $commentRepository;

    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository){
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function all($postId)
    {
        $post = $this->postRepository->find($postId);

        if($post)
        {
            return $this->commentRepository->all($post);
        }

        return null;
    }

    public function create(array $data, $postId)
    {
        $post = $this->postRepository->find($postId);
    
        if ($post) {
            return $this->commentRepository->create($post, $data);
        }
    
        return null;
    }


    public function update(array $data, $commentId)
    {
        $comment = $this->commentRepository->find($commentId);

        if($comment)
        {
            return $this->commentRepository->update($comment, $data);
        }

        return null;
    }


}