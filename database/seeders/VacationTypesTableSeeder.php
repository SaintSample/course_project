<?php

namespace Database\Seeders;

use App\Models\VacationType;
use Illuminate\Database\Seeder;

class VacationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $types = [
        'main',
        'unpaid',
        'decree'
    ];

    public function run()
    {
        collect($this->types)->each(function (string $type) {
            VacationType::create(['name' => $type]);
        });
    }
}
