<?php

namespace App\Providers;

use App\Models\User;
use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Livewire\Livewire;
use App\Http\Livewire\ProfileContactInformationForm;


class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->auth)
                            ->orWhere('username', $request->auth)
                            ->orWhere('phone', $request->auth)
                            ->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        //Jetstream::createTeamsUsing(CreateTeam::class);
        //Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        //Jetstream::addTeamMembersUsing(AddTeamMember::class);
        //Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        //Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        //Jetstream::deleteTeamsUsing(DeleteTeam::class);
        //Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);
            Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
