<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        factory(App\Models\User::class,10)->create();

        $users=[
            [
                'name'=>'admin',
                'email'=> 'haris@admin.com',
                'username'=>'admin',
                'password'=>bcrypt('admin'),
                'email_verified_at'=> Carbon::now(),
                'api_token' => Str::random(18),
                'is_peneliti' => true,
                'created_at'=> Carbon::now(),
            ],
            [
                'name'=>'haris',
                'email'=> 'haris@user.com',
                'username'=>'haris',
                'password'=>bcrypt('haris'),
                'email_verified_at'=> Carbon::now(),
                'api_token' => Str::random(18),
                'is_peneliti' => false,
                'created_at'=> Carbon::now(),
            ],
        ];
        \App\Models\User::insert($users);
    }
}
