<?php

namespace App\Http\Controllers;

use App\Services\FavoriteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function getFavoriteArticles(FavoriteService $service)
    {
        $user = Auth::user();
        $articles = $service->getFavorites($user, 'article');
        return response()->json($articles);
    }


    public function getFavoriteServices(FavoriteService $service)
    {
        $user = Auth::user();
        $services = $service->getFavorites($user, 'service');
        return response()->json($services);
    }


    public function toggleFavorite(FavoriteService $service, string $type, int $id)
    {
        $user = Auth::user();
        $result = $service->toggleFavorite($user, $type, $id);
        return response()->json($result, $result['status']);
    }
}
