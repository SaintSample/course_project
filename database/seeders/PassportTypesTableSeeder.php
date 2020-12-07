<?php

namespace Database\Seeders;

use App\Models\PassportType;
use Illuminate\Database\Seeder;

class PassportTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $types = [
        'russia',
        'ukraine',
        'kazakhstan',
        'international'
    ];

    public function run()
    {
        collect($this->types)->each(function (string $type) {
            PassportType::create(['name' => $type]);
        });
    }
}
