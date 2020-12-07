<?php

namespace Database\Seeders;

use App\Models\UserAddressType;
use Illuminate\Database\Seeder;

class AddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $types = [
        'registered',
        'only_living'
    ];

    public function run()
    {
        collect($this->types)->each(function (string $type) {
            UserAddressType::create(['name' => $type]);
        });
    }
}
