<?php

namespace App\Policies;

use App\User;
use App\Pegawai;
use Illuminate\Auth\Access\HandlesAuthorization;

class PegawaiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any pegawais.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the pegawai.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return mixed
     */
    public function view(User $user, Pegawai $pegawai)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $pegawai->id_poli);
    }

    /**
     * Determine whether the user can create pegawais.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->poli != null);
    }

    /**
     * Determine whether the user can update the pegawai.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return mixed
     */
    public function update(User $user, Pegawai $pegawai)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $pegawai->id_poli);
    }

    /**
     * Determine whether the user can delete the pegawai.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return mixed
     */
    public function delete(User $user, Pegawai $pegawai)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $pegawai->id_poli);
    }

    /**
     * Determine whether the user can restore the pegawai.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return mixed
     */
    public function restore(User $user, Pegawai $pegawai)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $pegawai->id_poli);
    }

    /**
     * Determine whether the user can permanently delete the pegawai.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return mixed
     */
    public function forceDelete(User $user, Pegawai $pegawai)
    {
        return ($user->poli != null) && ($user->poli->id_poli == $pegawai->id_poli);
    }
}
