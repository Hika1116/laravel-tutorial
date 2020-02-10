<?php

namespace App\Policies;

// use App\Policies\Log;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Folder;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Folder $folder)
    {
        Log::debug($user->id);
        return $user->id === $folder->user_id;
    }
}
