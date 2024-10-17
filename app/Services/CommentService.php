<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\User;

class CommentService
{
    public function getApprovedComments(Service $service)
    {
        return $service->comments()->where('status', 'approved')->orderBy('id', 'desc')->get();
    }


    public function getAllComments(User $user)
    {
        if ($user->can('see.comment'))
        {
            return Comment::orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403
            ];
        }
    }


    public function storeComment(User $user, array $data)
    {
        //
    }


    public  function changeStatus(User $user, Comment $comment, string $status)
    {
        if ($user->can('update.comment'))
        {
            $comment->update(['status' => $status]);
            return [
                "message" => 'Comment status updated successfully',
                "status" => 200
            ];
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403
            ];
        }
    }


    public function deleteComment(User $user, Comment $comment)
    {
        if ($user->can('delete.comment'))
        {
            $comment->delete();
            return [
                'message' => 'Comment deleted successfully',
                'status' => 200
            ];
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403
            ];
        }
    }
}






