<?php

namespace App\Policies;

use App\User;
use App\Fasilitas;
use Illuminate\Auth\Access\HandlesAuthorization;

class FasilitasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any fasilitas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the fasilitas.
     *
     * @param  \App\User  $user
     * @param  \App\Fasilitas  $fasilitas
     * @return mixed
     */
    public function view(User $user, Fasilitas $fasilitas)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $fasilitas->id_poli);
    }

    /**
     * Determine whether the user can create fasilitas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the fasilitas.
     *
     * @param  \App\User  $user
     * @param  \App\Fasilitas  $fasilitas
     * @return mixed
     */
    public function update(User $user, Fasilitas $fasilitas)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $fasilitas->id_poli);
    }

    /**
     * Determine whether the user can delete the fasilitas.
     *
     * @param  \App\User  $user
     * @param  \App\Fasilitas  $fasilitas
     * @return mixed
     */
    public function delete(User $user, Fasilitas $fasilitas)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $fasilitas->id_poli);
    }

    /**
     * Determine whether the user can restore the fasilitas.
     *
     * @param  \App\User  $user
     * @param  \App\Fasilitas  $fasilitas
     * @return mixed
     */
    public function restore(User $user, Fasilitas $fasilitas)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $fasilitas->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the fasilitas.
     *
     * @param  \App\User  $user
     * @param  \App\Fasilitas  $fasilitas
     * @return mixed
     */
    public function forceDelete(User $user, Fasilitas $fasilitas)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $fasilitas->id_poli);
    }
}
