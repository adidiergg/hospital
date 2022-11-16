<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Administrator::factory()->create([
          
            'email' => 'sebas@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            
         ]);

         \App\Models\Receptionist::factory()->create([
            'curp' => 's',
            'name_first' => 's',
            'name_last' => 's',
            'birth_date' => now(),
            'hire_date' => now(),
            'address' => 's',
            'phone_number' => 's',
            'email' => 'alanddgg@gmail.com',
            'gender' => 'masculino',
            //'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            
         ]);


         \App\Models\Doctor::factory()->create([
            'curp' => 's',
            'name_first' => 's',
            'name_last' => 's',
            'birth_date' => now(),
            'hire_date' => now(),
            'address' => 's',
            'phone_number' => 's',
            'email' => 'pablo@gmail.com',
            'gender' => 'masculino',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'license' => '123',
            'speciality'=> 'muy bueno',
         ]);

       
        \App\Models\Receptionist::factory(30)->create();
        \App\Models\Doctor::factory(30)->create();
        \App\Models\Patient::factory(30)->create();
        /*
        \App\Models\User::factory()->create([
            'curp' => 's',
            'name_first' => 's',
            'name_last' => 's',
            'birth_date' => now(),
            'hire_date' => now(),
            'address' => 's',
            'phone_number' => 's',
            'email' => 'alandidiergon@gmail.com',
            'gender' => 'masculino',
            //'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role'=>'administrador',
            'remember_token' => Str::random(10),
         ]);
         */
    }
}
