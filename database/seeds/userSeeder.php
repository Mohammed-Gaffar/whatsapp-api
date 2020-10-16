<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $manager = \App\User::create([
            'name'=>'Mogahid Gaffar',
            'slug'=>'Mogahid_Gaffar',
            'gender'=>'1',
            'phone'=>'09090909',
            'address'=>'khartoum',
            'email'=>'mogahidgaffar@gmail.com',
            'password'=>Hash::make('12345678'),
            'rank'=>1,
         ]);

      
         $marketer = \App\User::create([
            
            'name'=>'ali omer',
            'slug'=>'ali_omer',
            'gender'=>'1',
            'phone'=>'09090909',
            'address'=>'khartoum',
            'email'=>'aliomer@gmail.com',
            'password'=>Hash::make('12345678'),
            'rank'=>2,
         ]);

         $marketer = \App\User::create([
            
            'name'=>'khalid osama',
            'slug'=>'khalid_osama',
            'gender'=>'1',
            'phone'=>'09090909',
            'address'=>'bahri',
            'email'=>'khalidosama@gmail.com',
            'password'=>Hash::make('12345678'),
            'rank'=>2,
         ]);

         $marketer = \App\User::create([
            
            'name'=>'muna mukhtar',
            'slug'=>'muna_mukhtar',
            'gender'=>'0',
            'phone'=>'09090909',
            'address'=>'omdurman',
            'email'=>'munamukhtar@gmail.com',
            'password'=>Hash::make('12345678'),
            'rank'=>2,
         ]);

    }
}
