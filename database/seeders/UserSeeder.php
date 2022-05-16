<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create super admin
        $user =   User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->assignRole('admin');
       $user->image()->create(['url'=>'images/users/admin.png']);

        //create demo candidate
        \App\Models\User::factory(4)->create()->each(function ($user){
            $user->image()->create(['url'=>'images/users/user_'.$user->id.'.png']);
            $user->assignRole('candidate');
            
        });
    }
}
