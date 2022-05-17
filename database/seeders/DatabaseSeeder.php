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
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(ParameterSeeder::class);

        $this->call(CountrySeeder::class);

        $this->call(EntitySeeder::class);

        $this->call(ProfessionalSeeder::class);

        $this->call(IllnessSeeder::class);

        // $this->call(FormSeeder::class);
    }
}