<?php

use Illuminate\Database\Seeder;

class ShogiTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<11;$i++){
            DB::table('users')->insert([
            'name' => $i,
            'email' => $i.'@gmail.com',
            'strength' => $i.'級',
            'tactics' => '横歩取り',
            'password' => bcrypt('password'),
        ]);
        }
        
    }
}
