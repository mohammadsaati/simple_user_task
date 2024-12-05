<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ListCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($user) {
          //  return $user;
            return [
                'email' => $user->email,
                'name' => $user->name,
                'posts_count' => $user->posts_count,
                'posts' => $user->posts,
            ];
        })->toArray();
    }
}
