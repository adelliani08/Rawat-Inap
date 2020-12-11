<?php

namespace App\Policies;

use App\User;
use App\Poli;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoliPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any polis.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the poli.
     *
     * @param  \App\User  $user
     * @param  \App\Poli  $poli
     * @return mixed
     */
    public function view(User $user, Poli $poli)
    {
        return ($user->jenis_user == "1") || ($user->poli ? ($user->poli->id_poli == $poli->id_poli) : false);
    }

    /**
     * Determine whether the user can create polis.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->jenis_user == "1");
    }

    /**
     * Determine whether the user can update the poli.
     *
     * @param  \App\User  $user
     * @param  \App\Poli  $poli
     * @return mixed
     */
    public function update(User $user, Poli $poli)
    {
        return ($user->jenis_user == "1") || ($user->poli ? ($user->poli->id_poli == $poli->id_poli) : false);
    }

    /**
     * Determine whether the user can delete the poli.
     *
     * @param  \App\User  $user
     * @param  \App\Poli  $poli
     * @return mixed
     */
    public function delete(User $user, Poli $poli)
    {
        return ($user->jenis_user == "1");
    }

    /**
     * Determine whether the user can restore the poli.
     *
     * @param  \App\User  $user
     * @param  \App\Poli  $poli
     * @return mixed
     */
    public function restore(User $user, Poli $poli)
    {
        return ($user->jenis_user == "1");
    }

    /**
     * Determine whether the user can permanently delete the poli.
     *
     * @param  \App\User  $user
     * @param  \App\Poli  $poli
     * @return mixed
     */
    public function forceDelete(User $user, Poli $poli)
    {
        return ($user->jenis_user == "1");
    }
}
