<?php

use Illuminate\Database\Seeder;

class CooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        for($i = 1; $i <= 100; $i++) {
            $user = App\User::first()->id;
            DB::table('cooks')->insert([
                'user_id' => $user,
                'date' => date('Y-m-d H:i:s'),
                'when' => '朝',
                'menu' => 'test ' . $i,
                'ingregient' => 'test ' . $i,
                'memo' => 'メモメモ ' . $i,
                'url' => 'https://www.aaa.com',
            ]);
        }
    }
}
