<?php

use Illuminate\Database\Seeder;

use App\Infrastructures\Eloquents\EloquentUser;
use Illuminate\Contracts\Hashing\Hasher;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(EloquentUser $user, Hasher $hasher)
    {
        $user->name = 'saiki';
        $user->email = 'saiki@saiki';
        $user->password = $hasher->make('password');
        $user->save();
    }
}
