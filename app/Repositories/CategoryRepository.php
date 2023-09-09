<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {

    public function all(){
        return Category::all();
    }

    public function find($categoryId){
        return Category::find($categoryId);
    }

    public function create(array $data){
        return Category::create($data);
    }

    public function update(Category $category, array $data){
        $category->update($data);
        return $category;
    }

    public function delete($categoryId){
        
        $category = Category::find($categoryId);

        if ($category) {
            $category->delete();
            return true;
        }
        
        return false;
    }
}