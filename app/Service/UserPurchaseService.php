<?php

declare(strict_types=1);

namespace App\Service;

use App\User;
use App\Repository\UserRepositoryInterface;

class UserPurchaseService
{
    protected $repository;

    /**
     * UserPurchaseService constructor.
     *
     * @param UserRepositoryInterface $repository
     */
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param int $identifier
     *
     * @return User
     */
    public function retrievePurchase(int $identifier): User
    {
        $user = $this->repository->find($identifier);
        // データベースから取得した値を使った処理など
        $user = new User($user);
        return $user;
    }
}
