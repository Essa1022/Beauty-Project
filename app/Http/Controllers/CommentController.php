<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeCommentStatusRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getApprovedComments(CommentService $commentService, Service $service)
    {
        $comments = $commentService->getApprovedComments($service);
        return CommentResource::collection($comments);
    }


    public function getAllComments(CommentService $service)
    {
        $user = Auth::user();
        $comments = $service->getAllComments($user);
        if (isset($comments['error']))
        {
            return response()->json($comments, $comments['status']);
        }
        return CommentResource::collection($comments);
    }


    pubic function store(StoreCommentRequest $request,CommentService $service)
    {
        $user = Auth::user();
        $result = $service->storeComment($user,$request->validated());
        return response()->json($result, $result['status']);
    }


    public function changeStatus(ChangeCommentStatusRequest $request, CommentService $service, Comment $comment)
    {
        $user = Auth::user();
        $result = $service->changeStatus($user, $comment, $request->validated('status'));
        return response()->json($result, $result['status']);
    }


    public function delete(CommentService $service, Comment $comment)
    {
        $user = Auth::user();
        $result = $service->deleteComment($user,$comment);
        return response()->json($result, $result['status']);
    }
}
