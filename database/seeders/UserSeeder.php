<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersJson = file_get_contents(Storage::path('../data/seeders/users.json'));
        $users = json_decode($usersJson, true)['data'];

        DB::table('users')->delete();

        foreach ($users as $user) {
            DB::table('users')->insertOrIgnore([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
