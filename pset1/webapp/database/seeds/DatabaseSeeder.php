<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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
            'password' => bcrypt('adminadmin'),
            'role' => 'admin',
            'blocked' => false,
            'created_at' => '2017-11-03 00:00:00',
            'updated_at' => '2017-11-03 00:00:00',
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('useruser'),
            'role' => 'user',
            'blocked' => false,
            'created_at' => '2017-11-03 00:00:00',
            'updated_at' => '2017-11-03 00:00:00',
        ]);
    }
}
