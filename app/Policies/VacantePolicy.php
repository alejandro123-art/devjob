<?php

namespace App\Policies;

use App\Models\User;
use App\Models\vacante;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //pasandole el tipo de rol que puede ver crear vacante y mis vacantes
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, vacante $vacante)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
         //pasandole el tipo de rol que puede crear vacantes
         return $user->rol === 2;
       
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, vacante $vacante)
    {
        
        //revisa de que el usuario logeado es igual al que publico la vacante
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, vacante $vacante)
    {
        //
    }
}
