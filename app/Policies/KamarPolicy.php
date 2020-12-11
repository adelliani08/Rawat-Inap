<?php

namespace App\Policies;

use App\User;
use App\Kamar;
use Illuminate\Auth\Access\HandlesAuthorization;

class KamarPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any kamars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the kamar.
     *
     * @param  \App\User  $user
     * @param  \App\Kamar  $kamar
     * @return mixed
     */
    public function view(User $user, Kamar $kamar)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $kamar->ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can create kamars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the kamar.
     *
     * @param  \App\User  $user
     * @param  \App\Kamar  $kamar
     * @return mixed
     */
    public function update(User $user, Kamar $kamar)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $kamar->ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can delete the kamar.
     *
     * @param  \App\User  $user
     * @param  \App\Kamar  $kamar
     * @return mixed
     */
    public function delete(User $user, Kamar $kamar)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $kamar->ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can restore the kamar.
     *
     * @param  \App\User  $user
     * @param  \App\Kamar  $kamar
     * @return mixed
     */
    public function restore(User $user, Kamar $kamar)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $kamar->ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the kamar.
     *
     * @param  \App\User  $user
     * @param  \App\Kamar  $kamar
     * @return mixed
     */
    public function forceDelete(User $user, Kamar $kamar)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $kamar->ruang->gedung->id_poli);
    }
}
