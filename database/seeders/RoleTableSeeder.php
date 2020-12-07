<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    protected $roles = [
        'admin',
        'hr',
        'financial',
        'manager',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function ($roleName) {
            $role = Role::firstOrNew(['name' => $roleName, 'guard_name' => Role::GUARD_API]);
            $role->save();
        }, $this->roles);
    }
}
