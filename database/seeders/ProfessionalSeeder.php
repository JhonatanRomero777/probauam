<?php

namespace Database\Seeders;

use App\Models\Professional;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decoded_json = file_get_contents('C:\xampp\htdocs\probauam\public\assets\json\professionals.json');
        $professionals_json = json_decode($decoded_json, false);

        $cont = 1;

        foreach($professionals_json as $current_professional)
        {
            $user = User::create([
                'email' => "prueba".$cont."@gmail.com",
                'password' => hash('sha512','hola123')
            ])->assignRole('Professional');

            $professional = new Professional;
            $professional->user_id = $user->id;
            $professional->names = $current_professional->names;
            $professional->last_names = $current_professional->last_names;
            $professional->document = $current_professional->document;
            $professional->document_type = $current_professional->document_type;
            $professional->professional_card = $current_professional->professional_card;
            $professional->phone = $current_professional->phone;
            $professional->save();

            $cont++;
        }
    }
}