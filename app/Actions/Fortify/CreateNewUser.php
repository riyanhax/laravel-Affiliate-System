<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\userHasChild;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        $uniqueId = User::orderBy('id', 'DESC')->first()->id;
        $uniqueCode = date('Y-m H:i') . "_" . $uniqueId;

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => 2,
            'reffer_code' => $uniqueCode
        ]);

        if(!is_null($input['reffer_code'])){
            $fromReffer = User::where('reffer_code', $input['reffer_code'])->first();
            $userHasChildren = new userHasChild;
            $userHasChildren->from_refferd_user_id = $fromReffer->id;
            $userHasChildren->child_user_id = $user->id;
            $userHasChildren->save();
        }
    }
}
