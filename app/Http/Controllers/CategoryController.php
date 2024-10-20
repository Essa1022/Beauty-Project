<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
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
        return response()->json($result, $result['status']);
    }
}
