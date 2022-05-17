<?php

namespace Database\Seeders;

use App\Models\Illness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IllnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decoded_json = file_get_contents('C:\xampp\htdocs\probauam\public\assets\json\cie10.json');
        $illness_json = json_decode($decoded_json, false);

        foreach($illness_json as $current_illness)
        {
            $illness = new Illness;
            $illness->code = $current_illness->code;
            $illness->name = $current_illness->name;
            $illness->save();
        }
    }
}