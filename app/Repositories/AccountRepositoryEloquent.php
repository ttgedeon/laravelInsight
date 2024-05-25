<?php

namespace App\Repositories;

use App\Models\Account;
use App\Contracts\AccountRepository;


class AccountRepositoryEloquent extends BaseRepository implements AccountRepository
{

    public function __construct(Account $model)
    {
        parent::__construct(
            $model,
            [
                'filters' => [],
                'includes' => [],
                'sorts' => ['created_at'],
                'relations' => ['user']
            ]
        );
    }

}