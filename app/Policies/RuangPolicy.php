<?php

namespace App\Policies;

use App\User;
use App\Ruang;
use Illuminate\Auth\Access\HandlesAuthorization;

class RuangPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any ruangs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the ruang.
     *
     * @param  \App\User  $user
     * @param  \App\Ruang  $ruang
     * @return mixed
     */
    public function view(User $user, Ruang $ruang)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can create ruangs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the ruang.
     *
     * @param  \App\User  $user
     * @param  \App\Ruang  $ruang
     * @return mixed
     */
    public function update(User $user, Ruang $ruang)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can delete the ruang.
     *
     * @param  \App\User  $user
     * @param  \App\Ruang  $ruang
     * @return mixed
     */
    public function delete(User $user, Ruang $ruang)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can restore the ruang.
     *
     * @param  \App\User  $user
     * @param  \App\Ruang  $ruang
     * @return mixed
     */
    public function restore(User $user, Ruang $ruang)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $ruang->gedung->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the ruang.
     *
     * @param  \App\User  $user
     * @param  \App\Ruang  $ruang
     * @return mixed
     */
    public function forceDelete(User $user, Ruang $ruang)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $ruang->gedung->id_poli);
    }
}
