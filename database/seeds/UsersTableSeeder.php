<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE users");
        
        DB::table("users")->insert([
            'name'              => 'admin',
            'email'             => 'admin@laravelapi.test',
            'email_verified_at' => now(),
            'password'          => bcrypt(123),
            'remember_token'    => Str::random(10),
            'api_token'         => Str::random(60)
        ]);
        
        factory(User::class, 10)->create();
    }
}
