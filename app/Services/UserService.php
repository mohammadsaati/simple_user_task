<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * create new user
     *
     * @param array $userData
     * @return mixed
     */
    public function store(array $userData)
    {
        $userData['password'] = Hash::make($userData['password']);

        return User::create($userData);
    }

    /**
     * get user that has more than  posts which post has more than 10 comments
     *
     * @return Collection
     */
    public function getList(): Collection
    {
        return User::query()->whereHas('posts', function ($query) {
            $query->whereHas('comments', function ($query) {
                $query->havingRaw('COUNT(*) > 10');
            })->havingRaw('COUNT(*) > 5');
        })->with(['posts' => function ($postQuery) {
            $postQuery->whereHas('comments', function ($query) {
                $query->havingRaw('COUNT(*) > 10');
            })->withCount('comments')->orderBy('id', 'DESC');
        }])->withCount('posts')
            ->get();

    }
}
