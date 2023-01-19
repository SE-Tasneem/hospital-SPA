<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CompanyProfile::create([
          'name' => 'المستشفى الدولي',
          'en_name' => 'International Hospital'
        ]);
    }
}
