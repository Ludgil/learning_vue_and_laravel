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
        // $user = \App\User::create([
        //     'name' => 'testeur',
        //     'email' => 'testeur@testeur.com',
        //     'password' => bcrypt('password'),
        // ]);

        // $user->restaurants()->create([
        //         'name'=>'random restau',
        //         'location'=> 'america ameriiiicaa ameeericaaaa',
        // ]);

        // $user->restaurants()->create([
        //     'name'=>'yolo restau',
        //     'location'=> 'bresil, 56, rue des pigeons',
        // ]);
        
        // $user->restaurants()->create([
        //     'name'=>'bigmac restau',
        //     'location'=> 'vanezuela, 46, rue du omg',
        // ]);


       $users = factory(\App\User::class, 5)->create();

       $users->each(function($user){
           $restaurants = factory(\App\Restaurant::class, rand(2,3))->create(['owner_id' => $user->id]);
           $restaurants->each(function($restaurant)use($user){
               factory(\App\Order::class, rand(10,15))->create(['resto_id' => $restaurant->id, 'user_id'=>$user->id]);
           });
        });
        
    }
}
