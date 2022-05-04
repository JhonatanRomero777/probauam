<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Country;
use App\Models\Department;
use App\Models\City;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country();
        $country->name = 'Colombia';
        $country->save();
        $this->fillJon('C:\xampp\htdocs\probauam\public\assets\json\colombia.json' , $country->id);

        $country = new Country();
        $country->name = "México";
        $country->save();
        $this->fillJon('C:\xampp\htdocs\probauam\public\assets\json\mexico.json' , $country->id);
    }

    public function fillJon($path , $country_id)
    {
        $decoded_json = file_get_contents($path);
        $country_json = json_decode($decoded_json, false);
 
        foreach($country_json as $current_department)
        {
            $department = new Department();
            $department->name = $current_department->department;
            $department->country_id = $country_id;
            $department->save();

            foreach($current_department->cities as $current_city)
            {
                $city = new City();
                $city->name = $current_city;
                $city->department_id = $department->id;
                $city->save();
            }
        }
    }
}