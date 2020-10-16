<?php

use Illuminate\Database\Seeder;

class MarketerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marketer = \App\marketer::create([
            'user_id'=>'1',
            'name'=>'ali omer',
            'slug'=>'ali_omer',
            'gender'=>'1',
            'phone'=>'09090909',
            'address'=>'khartoum',
         ]);

         $marketer = \App\marketer::create([
            'user_id'=>'1',
            'name'=>'khalid osama',
            'slug'=>'khalid_osama',
            'gender'=>'1',
            'phone'=>'09090909',
            'address'=>'bahri',
         ]);

         $marketer = \App\marketer::create([
            'user_id'=>'1',
            'name'=>'muna mukhtar',
            'slug'=>'muna_mukhtar',
            'gender'=>'0',
            'phone'=>'09090909',
            'address'=>'omdurman',
         ]);

    }
}
