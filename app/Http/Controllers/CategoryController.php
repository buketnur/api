<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        
        $categories = $this->categoryRepository->all();

        return response()->json($categories, Response::HTTP_OK);
    }

    public function show($categoryId)
    {
        $category = $this->categoryRepository->find($categoryId);

        if($category)
        {
            return response()->json($category, Response::HTTP_OK);
        }
        return response()->json(['message' => 'Category not found'], Respose::HTTP_NOT_FOUND);
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = $this->categoryRepository->create($validatedData);

        return response()->json($category,Response::HTTP_CREATED);
    }

    public function destroy($categoryId){


        if ($this->categoryRepository->delete($categoryId)) {
            return response()->json(['message' => 'Kategori başarıyla silindi'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Kategori bulunamadı'], Response::HTTP_NOT_FOUND);
        }
    }
}
