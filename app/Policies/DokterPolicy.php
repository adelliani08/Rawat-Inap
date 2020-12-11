<?php

namespace App\Policies;

use App\User;
use App\Dokter;
use Illuminate\Auth\Access\HandlesAuthorization;

class DokterPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any dokters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the dokter.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function view(User $user, Dokter $dokter)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $dokter->id_poli);
    }

    /**
     * Determine whether the user can create dokters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the dokter.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function update(User $user, Dokter $dokter)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $dokter->id_poli);
    }

    /**
     * Determine whether the user can delete the dokter.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function delete(User $user, Dokter $dokter)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $dokter->id_poli);
    }

    /**
     * Determine whether the user can restore the dokter.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function restore(User $user, Dokter $dokter)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $dokter->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the dokter.
     *
     * @param  \App\User  $user
     * @param  \App\Dokter  $dokter
     * @return mixed
     */
    public function forceDelete(User $user, Dokter $dokter)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $dokter->id_poli);
    }
}
