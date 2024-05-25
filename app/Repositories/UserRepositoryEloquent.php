<?php

namespace App\Repositories;

use App\Contracts\UserRepository;
use App\Models\User;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    public function __construct(User $model)
    {
        parent::__construct(
            $model,
            [
                'filters' => [],
                'includes' => ['account'],
                'sorts' => ['created_at'],
                'relations' => [],
            ]
        );
    }

}