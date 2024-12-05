<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\user\ListCollection;
use App\Http\Resources\user\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(public UserService $service)
    {
    }

    /**
     * create user and show info
     *
     * @param CreateUserRequest $request
     * @return UserResource
     */
    public function store(CreateUserRequest $request): UserResource
    {
        $user = $this->service->store(userData: $request->validated());

        return new UserResource($user);
    }

    /**
     * show user list with post filter
     *
     * @return ListCollection
     */
    public function getList(): ListCollection
    {
         return ListCollection::make($this->service->getList());
    }
}
