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
            'name'=>'administrador',
            'email'=>'administrador@administrador.com', 
            'password'=>bcrypt('admininstrador'),
            'role'=> 'administrador'
        ]);
    }
}
