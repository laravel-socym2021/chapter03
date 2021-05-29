<?php
declare(strict_types=1);

namespace App\Repository;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function find(int $id): array
    {
        $user = User::find($id)->toArray();
        // 何かの処理
        return $user;
    }
}
