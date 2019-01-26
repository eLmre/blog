<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => 2,
            'password' => bcrypt('password'),
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
