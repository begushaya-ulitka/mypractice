<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => Role::$USER_ID, 'name' => Role::$USER],
            ['id' => Role::$SUPPORT_ID, 'name' => Role::$SUPPORT],
        ];

        DB::table('roles')->insert($roles);
    }
}
