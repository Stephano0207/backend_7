<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(

            [
        "nombre"=>"Adobe",
        "apellido"=>"Castillo",
        "direccion"=>"Su casa",
        "edad"=>26,
        "dni"=>"1234567889"
        ]
    );
    }
}
