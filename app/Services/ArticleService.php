<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Arr;

class ArticleService
{
    public function articlesList()
    {
        $articles = Article::where('status', true)->orderBy('id', 'desc')->paginate(10);
        return $articles;
    }


    public function showArticle($article)
    {
        if (!$article->status)
        {
            return [
                'error' => 'Can\'t access this page',
                'status' => 403
            ];
        }

        return $article;
    }


    public function adminArticlesList(User $user)
    {
        if (!$user->can('see.article'))
        {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return $articles;
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403
            ];
        }
    }


    public function adminShowArticle(User $user, Article $article)
    {
        if (!$user->can('see.article'))
        {
        return $article;
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403
            ];
        }
    }


    public function storeArticle(User $user, array $data)
    {
        if ($user->can('store.article'))
        {
            $article = Article::create($data);
            return [
                'message' => 'Article created successfully',
                'data' => $article,
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


    public function updateArticle(User $user, Article $article, array $data)
    {
        if ($user->can('update.article'))
        {
            $result = $article->update($data);
            return [
                'message' => 'Article updated successfully',
                'data' => $result,
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


    public function deleteArticle(User $user, Article $article)
    {
        if ($user->can('delete.article'))
        {
            $article->delete();
            return [
                'message' => 'Article deleted successfully',
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







