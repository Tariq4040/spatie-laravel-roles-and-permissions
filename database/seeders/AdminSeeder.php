<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$8YrDDSSzQjKysLjiHKpMgevbFOD/wtP41K9mUfiJbd41kALuqQoN.', // admin@123
        ]);
        $user->assignRole(['writer', 'admin']);
    }
}
