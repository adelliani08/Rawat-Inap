<?php

namespace App\Policies;

use App\User;
use App\Gedung;
use Illuminate\Auth\Access\HandlesAuthorization;

class GedungPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any gedungs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the gedung.
     *
     * @param  \App\User  $user
     * @param  \App\Gedung  $gedung
     * @return mixed
     */
    public function view(User $user, Gedung $gedung)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $gedung->id_poli);
    }

    /**
     * Determine whether the user can create gedungs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the gedung.
     *
     * @param  \App\User  $user
     * @param  \App\Gedung  $gedung
     * @return mixed
     */
    public function update(User $user, Gedung $gedung)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $gedung->id_poli);
    }

    /**
     * Determine whether the user can delete the gedung.
     *
     * @param  \App\User  $user
     * @param  \App\Gedung  $gedung
     * @return mixed
     */
    public function delete(User $user, Gedung $gedung)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $gedung->id_poli);
    }

    /**
     * Determine whether the user can restore the gedung.
     *
     * @param  \App\User  $user
     * @param  \App\Gedung  $gedung
     * @return mixed
     */
    public function restore(User $user, Gedung $gedung)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $gedung->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the gedung.
     *
     * @param  \App\User  $user
     * @param  \App\Gedung  $gedung
     * @return mixed
     */
    public function forceDelete(User $user, Gedung $gedung)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $gedung->id_poli);
    }
}
