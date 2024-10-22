<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;

class CreateAdminAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--email=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new admin account with default admin password, which has to be changed after first login';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        if (! isset($email)) {
            $email = $this->ask('Enter email for new admin account');
        }

        $name = $this->option('name');
        if (! isset($name)) {
            $name = $this->ask('Enter name for new admin account');
        }

        $password = config('auth.admin.password');
        $passwordHash = Hash::make($password);

        User::create([
            'name' => $name,
            'email' => $email,
            'is_admin' => true,
            'must_change_password' => true,
            'password' => $passwordHash,
        ]);

        $this->info("New admin account with email '$email' and name '$name' created succesfully!");
    }
}
