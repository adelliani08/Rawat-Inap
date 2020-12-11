<?php

namespace App\Policies;

use App\User;
use App\Perawat;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerawatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any perawats.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the perawat.
     *
     * @param  \App\User  $user
     * @param  \App\Perawat  $perawat
     * @return mixed
     */
    public function view(User $user, Perawat $perawat)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $perawat->id_poli);
    }

    /**
     * Determine whether the user can create perawats.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the perawat.
     *
     * @param  \App\User  $user
     * @param  \App\Perawat  $perawat
     * @return mixed
     */
    public function update(User $user, Perawat $perawat)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $perawat->id_poli);
    }

    /**
     * Determine whether the user can delete the perawat.
     *
     * @param  \App\User  $user
     * @param  \App\Perawat  $perawat
     * @return mixed
     */
    public function delete(User $user, Perawat $perawat)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $perawat->id_poli);
    }

    /**
     * Determine whether the user can restore the perawat.
     *
     * @param  \App\User  $user
     * @param  \App\Perawat  $perawat
     * @return mixed
     */
    public function restore(User $user, Perawat $perawat)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $perawat->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the perawat.
     *
     * @param  \App\User  $user
     * @param  \App\Perawat  $perawat
     * @return mixed
     */
    public function forceDelete(User $user, Perawat $perawat)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $perawat->id_poli);
    }
}
