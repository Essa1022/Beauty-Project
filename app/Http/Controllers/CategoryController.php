<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(CategoryService $service)
    {
        $categories = $service->categoriesList();
        return CategoryResource::collection($categories);
    }

    public function update(UpdateCategoryRequest $request, CategoryService $service, Category $category)
    {
        $LoggedInUser = Auth::user();
        $result = $service->update($LoggedInUser, $category, $request->validated('name'));
        return [$result, $result['status']];
    }
}
