<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Service;
use App\Models\User;

class FavoriteService
{
    public function getFavorites(User $user, string $type)
    {
        switch ($type)
        {
            case 'article':
                return $user->articles()->where('status', true)
                    ->orderBy('favorites.id', 'desc')
                    ->paginate(10);
            case 'service':
                return $user->services()
                    ->orderBy('favorites.id', 'desc')
                    ->paginate(10);
            default:
                return [];
        }
    }


    public function toggleFavorite(User $user, string $type, int $id)
    {
        switch ($type) {
            case 'article':
                $favoritable = Article::findOrFail($id);
                if (!$favoritable->status) {
                    return [
                        'message' => 'Article is not approved.',
                        'status' => 400
                    ];
                }
                if ($user->articles()->where('favoritable_id', $id)->exists()) {
                    $user->articles()->detach($favoritable->id);
                    return [
                        'message' => 'Favorite removed successfully',
                        'status' => 200
                    ];
                } else {
                    $user->articles()->attach($favoritable->id);
                    return [
                        'message' => 'Favorite added successfully',
                        'status' => 200
                    ];
                }
                break;

            case 'service':
                $favoritable = Service::findOrFail($id);
                if ($user->services()->where('favoritable_id', $id)->exists()) {
                    $user->services()->detach($favoritable->id);
                    return [
                        'message' => 'Favorite removed successfully',
                        'status' => 200
                    ];
                } else {
                    $user->services()->attach($favoritable->id);
                    return [
                        'message' => 'Favorite added successfully',
                        'status' => 200
                    ];
                }
                break;

            default:
                return [
                    'message' => 'Invalid type',
                    'status' => 400
                ];
        }
    }


}
