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
        /* \DB::table('users')->insert(
          [
            'name' => "Admnistrador",            
            'cpf'=> "04352598143",
            'email' => "adm@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => "asdgfasdgfad",

          ]            
            
        ); 
 */
         factory(\App\User::class, 40)->create()->each(function($user){
          $user->store()->save(factory(\App\Store::class)->make()); 


        });
    }
}