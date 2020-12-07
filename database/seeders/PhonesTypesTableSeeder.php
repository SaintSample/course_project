<?php

namespace Database\Seeders;

use App\Models\UserPhoneType;
use Illuminate\Database\Seeder;

class PhonesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $types = [
        'corp',
        'personal',
        'work',
        'local'
    ];

    public function run()
    {
        collect($this->types)->each(function (string $type) {
            UserPhoneType::create(['name' => $type]);
        });
    }
}
