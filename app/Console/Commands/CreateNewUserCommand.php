<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateNewUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user['name'] = $this->ask('name of the user ?');
        $user['email'] = $this->ask('email of the new user ?');
        $user['password'] = $this->secret('password of the user ?');
        $roleName = $this->choice('Role of the new user ?', ['admin', 'editor'], 1);
        $role = Role::where('name', $roleName)->first();
        if (! $role) {
            $this->error('Role not found');

            return -1;
        }
        // Validate the input
        $validator = Validator::make($user, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:8', 'string'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $errors) {
                $this->error($errors);

            }

            return 1;
        }

        DB::transaction(function () use ($user, $role) {
            $user['password'] = Hash::make($user['password']);
            $newUser = User::create($user);
            $newUser->roles()->attach($role->id);

        });

        $this->info("User {$user['name']} created successfully with email {$user['email']}");

        return -1;
    }
}
