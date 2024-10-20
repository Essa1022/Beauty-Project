<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UsersListResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(UserService $service)
    {
        $LoggedInUser = Auth::user();
        $result = $service->usersList($LoggedInUser);

        if (isset($result['error']))
        {
            return response()->json($result, $result['status']);
        }
        return UsersListResource::collection($result);
    }

    public function show(UserService $service, User $user)
    {
        $LoggedInUser = Auth::user();
        $result = $service->show($LoggedInUser, $user);
        return response()->json($result);
    }

    public function store(StoreUserRequest $request, UserService $service)
    {
        $result = $service->storeUser($request->validated());
        return response()->json($result, $result['status']);
    }

    public function update(UpdateUserRequest $request, UserService $service, User $user)
    {
        $LoggedInUser = Auth::user();
        $result = $service->updateUser($LoggedInUser, $user, $request->validated());
        return response()->json($result);
    }

    public function delete(UserService $service, User $user)
    {
        $LoggedInUser = Auth::user();
        $result = $service->deleteUser($LoggedInUser, $user);
        return response()->json($result);
    }

    public function showProfile()
    {
        $user = User::find(Auth::id());
        return UserResource::make($user);
    }


    public function updateProfile(UpdateProfileRequest $request, UserService $service)
    {
        $user = Auth::user();
        $result = $service->updateProfile($user, $request->validated());
        return response()->json($result, $result['status']);
    }

    public function deleteProfile(UserService $service)
    {
        $user = Auth::user();
        $result = $service->deleteProfile($user);
        return response()->json($result, $result['status']);
    }
}
