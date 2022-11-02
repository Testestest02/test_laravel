<?php

namespace App\Repositories;

use App\Models\User;

class TestRepository
{
    /**
     * ユーザーの登録情報取得
     * 
     * @param User $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->tests()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}