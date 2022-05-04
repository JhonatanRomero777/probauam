<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decoded_json = file_get_contents('C:\xampp\htdocs\probauam\public\assets\json\parameters.json');
        $parameters_json = json_decode($decoded_json, false);

        foreach($parameters_json as $current_parameter)
        {
            $parameter = new Parameter();
            $parameter->name = $current_parameter->name;
            $parameter->save();

            foreach($current_parameter->options as $current_option)
            {
                $option = new Option();
                $option->parameter_id = $parameter->id;
                $option->name = $current_option;
                $option->save();
            }
        }
    }
}