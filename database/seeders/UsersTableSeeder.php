<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'johndoe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'username' => 'alireza',
                'email' => 'alireza@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'username' => 'zahra',
                'email' => 'zahra@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'username' => 'abolnoori',
                'email' => 'abolnoori@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'username' => 'AMIN UPDATE',
                'email' => 'aminakbariUP@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'username' => 'mehran mohammadi',
                'email' => 'mohammadipoya3@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'username' => 'AMIN UPDATE',
                'email' => 'aboliam@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'username' => 'asal noori',
                'email' => 'asalnoori@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' =>9 ,
                'username' => 'abol2',
                'email' => 'abolnoori2@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'username' => 'abol test',
                'email' => 'abol@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'username' => 'pedram69n',
                'email' => 'pedram69n@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'username' => 'pedram69n',
                'email' => 'pedram69nalt@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
