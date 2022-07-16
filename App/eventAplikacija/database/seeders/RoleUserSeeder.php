<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            [
                'role_id' => '1',
                'user_id' => '1'
            ],
            [
                'role_id' => '2',
                'user_id' => '1'
            ],
            [
                'role_id' => '3',
                'user_id' => '1'
            ]
        ]);

        DB::table('role_user')->insert([
            [
                'role_id' => '1',
                'user_id' => '2'
            ],
            [
                'role_id' => '2',
                'user_id' => '2'
            ],
            [
                'role_id' => '3',
                'user_id' => '2'
            ]
        ]);

        DB::table('role_user')->insert([
            [
                'role_id' => '1',
                'user_id' => '3'
            ],
            [
                'role_id' => '2',
                'user_id' => '3'
            ],
            [
                'role_id' => '3',
                'user_id' => '3'
            ]
        ]);

        $roles = Role::all();

        $users = User::where([
            ['id', '!=', '1'],
            ['id', '!=', '2'],
            ['id', '!=', '3']
        ])->get();

        $users->each(function($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(1)->pluck('id')
            );
        });
    }
}
