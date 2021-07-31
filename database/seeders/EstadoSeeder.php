<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Database::table('estados')->insert([
            [
                "nombre"=>"INICIADO"
            ],
            [
                "nombre"=>"NO INICIADO"
            ],
            [
                "nombre"=>"DATOS PAGO RECIBIDO"
            ],
            [
                "nombre"=>"XML GENERADO"
            ],
            [
                "nombre"=>"RESPUESTA API2 ENVIADA"
            ],
            [
                "nombre"=>"DOCUMENTO PDF GENERADO"
            ]
            ]);
    }
}
