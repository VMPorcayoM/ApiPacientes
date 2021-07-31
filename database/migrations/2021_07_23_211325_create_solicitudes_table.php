<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id_solicitud')->unique();
            $table->string('llave',100);
            $table->smallInteger('id_tramite');
            $table->string('no_solicitud',20);
            $table->date('fecha_solicitud');
            $table->time('hora_solicitud');
            $table->string('no_solicitud_api',10);
            $table->date('fecha_solicitud_api')->useCurrent();
            $table->time('hora_solicitud_api', $precision = 0)->useCurrent();

            $table->tinyInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');

            $table->string('id_electronico',20)->nullable();
            $table->string('referencia_pago',50)->nullable();
            $table->date('fecha_pago')->nullable();
            $table->time('hora_pago')->nullable();
            $table->string('stripe_orden_id',27)->nullable();
            $table->string('stripe_creado',20)->nullable();
            $table->string('stripe_mensaje',20)->nullable();
            $table->string('stripe_tipo',15)->nullable();
            $table->string('stripe_digitos',4)->nullable();
            $table->string('stripe_red',15)->nullable();
            $table->string('xml_url',100)->nullable();
            $table->tinyInteger('no_consulta')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
