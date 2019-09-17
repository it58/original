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
        // テストユーザを作成
        for($i=1;$i<11;$i++){
            DB::table('users')->insert([
            'name' => $i,
            'email' => $i.'@gmail.com',
            'strength' => $i.'級',
            'tactics' => '横歩取り',
            'password' => bcrypt('password'),
            ]);
        }
        // タグの初期値を挿入
        $data  = \Config::get('tactics.senpou') + 
        ['詰将棋' => '詰将棋'] + 
        ['次の一手' => '次の一手'] + 
        ['形勢評価' => '形勢評価']; 
        
        foreach($data as $tag){
            DB::table('tags')->insert([
                'tag' => $tag,
            ]);
            
        }
        
    }
}
