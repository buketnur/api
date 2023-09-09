<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;

    public function __construct(PostService $postService, PostRepository $postRepository)
    {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all();

        return response()->json($posts, Response::HTTP_OK);

    }

    public function show($postId) // parametre -> GET
    {
        $post = $this->postRepository->find($postId);

        if ($post) {
            return response()->json($post, Response::HTTP_OK);
        }

        return response()->json(['message' => 'Post not found'], Response::HTTP_NOT_FOUND);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' =>'required',
            'category_id' =>'required|exists:categories,id',
        ]);

        $post = $this->postRepository->create($validated);

        return response()->json($post, Response::HTTP_CREATED);


    }

    public function update(Request $request, $postId)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' =>'required',
            'category_id' =>'required|exists:categories,id',
        ]);

        
        $post = $this->postRepository->update($postId, $validated);

        if($post){
            return response()->json($post, Response::HTTP_OK);

        }

        return response()->json(['message'=>'Post not found'], Response::HTTP_NOT_FOUND);
    }

}
