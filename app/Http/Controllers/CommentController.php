<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    protected $commentService;
    
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index($postId)
    {
        $comments = $this->commentService->all($postId);

        if($comments)
        {
            return response()->json($comments, Response::HTTP_OK);
        }

            return response()->json(['message' => 'Post not found'], Response::HTTP_NOT_FOUND);
    }

    public function save(Request $request, $postId)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = $this->commentService->create($validatedData, $postId);

        if($comment)
        {
            return response()->json($comment, Response::HTTP_CREATED);
        }

        return response()->json(['message' => 'Post not found']);

    }

    public function update(Request $request, $commentId)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = $this->commentService->update($validatedData, $commentId);

        if($comment)
        {
            return response()->json($comment, Response::HTTP_OK);
        }

        return response()->json(['message' => 'Comment update failed']);

    }

}
