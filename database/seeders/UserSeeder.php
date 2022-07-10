<?php

namespace Database\Seeders;

use App\Models\User;
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

        DB::table('users')->truncate();

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'phone' => $user['phone'],
                'status' => $user['status'],
            ]);
        }

        User::factory(50)->create();
    }
}
