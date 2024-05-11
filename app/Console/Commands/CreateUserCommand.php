<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates a new uesr';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $user['name'] = $this->ask('Name of the new user');
        $user['email'] = $this->ask('Email of the new user');
        $user['password'] = Hash::make($this->secret('password of the new user'));

        $RoleName = $this->choice('role of the new user', ['admin', 'editor'], 1);
        $role = Role::where('name', $RoleName)->first();
        if (! $role) {
            $this->error('Role not found');

            return -1;
        }
        DB::transaction(function () use ($user, $role) {
            $newUser = User::create($user);
            $newUser->roles()->attach($role->id);
        });

        $this->info('user '.$user['email'].'created successfully');

        return 0;
    }
}
