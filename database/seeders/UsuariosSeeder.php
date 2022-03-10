<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            "name"=>"Cecilia Juarez",
            "email"=>"cecilia.juarez@evotek.com.mx",
            "password"=>"123.",
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            "tipo_usuario"=>1,
            "estatus"=>"activo"
        ]);
        User::insert([
            "name"=>"Angela Sanchez",
            "email"=>"angela.sanchez@evotek.com.mx",
            "password"=>"123.",
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            "tipo_usuario"=>1,
            "estatus"=>"activo"
        ]);
    }
}
