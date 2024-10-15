<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;

class CategoryService
{
    public function categoriesList()
    {
        return Category::all();
    }

    public function update(User $LoggedInUser, Category $category, $name)
    {
        if ($LoggedInUser->can('update.category'))
        {
            $category->update(['name' => $name]);
            return [
                'message' => 'Category updated successfully',
                'data' => $category,
                'status' => 200
            ];
        }
        else
        {
            return [
                'message' => 'You are not authorized to update category',
                'status' => 401
            ];
        }
    }
}






