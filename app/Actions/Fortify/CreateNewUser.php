<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:40'],
            'surname' => ['required', 'string', 'max:100'],
            'comercial' => ['string', 'max:6'],
            'estado' => ['string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], //editar con lo aprendido
            'dni' => ['required', 'string', 'max:9', 'min:9', 'unique:users'],
            'telefono' => ['required', 'string', 'max:9', 'min:9', 'unique:users'],
            'fecha_nacimiento' => ['required', 'date'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'role_id' => 3,
                'comercial' => $input['comercial'],
                'estado' => $input['estado'],
                'email' => $input['email'],
                'dni' => $input['dni'],
                'telefono' => $input['telefono'],
                'fecha_nacimiento' => $input['fecha_nacimiento'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
