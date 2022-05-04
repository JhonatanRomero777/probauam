<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decoded_json = file_get_contents('C:\xampp\htdocs\probauam\public\assets\json\entities.json');
        $entities_json = json_decode($decoded_json, false);

        foreach($entities_json as $current_entity)
        {
            $entity = new Entity();
            $entity->name = $current_entity->name;
            $entity->nit = $current_entity->nit;
            $entity->phone = $current_entity->phone;
            $entity->direction = $current_entity->direction;
            $entity->city_id = $current_entity->city_id;
            $entity->save();
        }
    }
}