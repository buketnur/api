<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService{

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;

    }

    public function update($id, array $attributes){
        $post = $this->postRepository->find($id);

        if(!$post)
        return false;

        return $this->postRepository->update($id, $attributes);
    }
}