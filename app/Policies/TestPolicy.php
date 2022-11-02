<?php

namespace App\Policies;

use App\Models\User;
//追加した項目↓
use App\Models\Test;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 指定したユーザーのログインのとき削除可能
     * 
     * @param User $user
     * @param Test $test
     * @return bool
     */
    public function destroy(User $user, Test $test)
    {
        // dd($user, $test);
        return $user->id === $test->user_id;
    }
}
