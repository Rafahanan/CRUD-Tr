<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
   use Illuminate\Support\Facades\Hash;
   use Illuminate\Database\Seeder;

   class UsersTableSeeder extends Seeder
   {
       public function run()
       {
           DB::table('users')->insert([
               [
                   'name' => 'Admin User',
                   'email' => 'admin@example.com',
                   'password' => Hash::make('admin123'),
                   'role' => 'admin',
        
               ],
               [
                   'name' => 'Superadmin User',
                   'email' => 'superadmin@example.com',
                   'password' => Hash::make('admin123'),
                   'role' => 'superadmin',
            
               ],
           ]);
       }
   }

