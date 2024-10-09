<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function usersList(User $LoggedInUser)
    {
        if ($LoggedInUser->can('see.user'))
        {
            return User::all();
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403,
            ];
        }
    }

    public function show(User $LoggedInUser, User $user)
    {
        if ($LoggedInUser->can('see.user'))
        {
            return [
                'data' => $user,
                'status' => 200,
                ];
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403,
            ];
        }
    }

    public function storeUser(array $data)
    {
        $user = User::create($data);
        return [
            'message' => 'User created successfully',
            'data' => $user,
            'status' => 200
        ];
    }

    public function updateUser(User $LoggedInUser, User $user, array $data)
    {
        if ($LoggedInUser->can('update.user'))
        {
            $user->update($data);
            return [
                'message' => 'User updated successfully',
                'data' => $user,
                'status' => 200
            ];
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403,
            ];
        }
    }

    public function deleteUser(User $LoggedInUser, User $user)
    {
        if (!$LoggedInUser->can('delete.user'))
        {
            $user->delete();
            return [
                'message' => 'User deleted successfully',
                'status' => 200
            ];
        }
        else
        {
            return [
                'error' => 'You don\'t have permission to access this page',
                'status' => 403,
            ];
        }
    }

    public function updateProfile(User $user, array $data)
    {
        $user->update($data);
        return [
            'message' => 'Profile updated successfully',
            'data' => $user,
            'status' => 200
        ];
    }

    public function deleteProfile(User $user)
    {
        $user->delete();
        return [
            'message' => 'User deleted successfully',
            'status' => 200
        ];
    }
}






