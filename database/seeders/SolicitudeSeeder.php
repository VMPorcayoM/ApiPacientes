<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SolicitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitudes')->insert([
        	[
                "llave"=>"asdakjsdfnjedsnksdfnl",
                "id_tramite"=>"1",
                "no_solicitud"=>"2020-815",
                "fecha_solicitud"=>"2020-02-03",
                "hora_solicitud"=>"14:00:00",
                "no_solicitud_api"=>"2020-0001",
                "fecha_solicitud_api"=>"2020-03-08",
                "hora_solicitud_api"=>"15:00:00",
                "id_electronico"=>null,
                "referencia_pago"=>null,
                "fecha_pago"=>null,
                "hora_pago"=>null,
                "stripe_orden_id"=>null,
                "stripe_creado"=>null,
                "stripe_mensaje"=>null,
                "stripe_tipo"=>null,
                "stripe_digitos"=>null,
                "stripe_red"=>null,
                "no_consulta"=>null
            ],
        ]);
    }
}
