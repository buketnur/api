<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository {

    public function all(){
        return Post::all();
    }

    public function find(int $id){
        return Post::find($id);
    }

    public function create($attributes){
        return Post::create($attributes);
    }

    public function update($id, array $attributes){
        return Post::find($id)->update($attributes);
    }

    public function delete($id){
        return Post::find($id)->delete();
    }
}


