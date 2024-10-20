<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(ArticleService $service)
    {
        $articles = $service->articlesList();
        return ArticleResource::collection($articles);
    }


    public function show(ArticleService $service, Article $article)
    {
        $result = $service->showArticle($article);
        if (isset($result['error']))
        {
            return response()->json($result, $result['status']);
        }
        return ArticleResource::make($result);
    }


    public  function adminIndex(ArticleService $service)
    {
        $user = Auth::user();
        $articles = $service->adminArticlesList($user);
        if (isset($articles['error']))
        {
            return response()->json($articles, $articles['status']);
        }
        return ArticleResource::collection($articles);
    }


    public function adminShow(ArticleService $service, Article $article)
    {
        $user = Auth::user();
        $article = $service->adminShowArticle($user, $article);
        if (isset($article['error']))
        {
            return response()->json($article, $article['status']);
        }
        return ArticleResource::make($article);
    }


    public function store(StoreArticleRequest $request, ArticleService $service)
    {
        $user = Auth::user();
        $result = $service->storeArticle($user, $request->validated());
        return response()->json($result, $result['status']);
    }


    public function update(UpdateArticleRequest $request, ArticleService $service, Article $article)
    {
        $user = Auth::user();
        $result = $service->updateArticle($user, $article, $request->validated());
        return response()->json($result, $result['status']);
    }


    public function delete(ArticleService $service, Article $article)
    {
        $user = Auth::user();
        $result = $service->deleteArticle($user, $article);
        return response()->json($result, $result['status']);
    }
}
