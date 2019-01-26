<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'user',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'manager',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
