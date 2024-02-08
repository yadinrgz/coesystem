<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket_id',100)->unique();
            $table->string('name');
            $table->string('email');
            $table->integer('category');
            $table->string('subject');
            $table->string('status');
            $table->string('esfera_izq');
            $table->string('esfera_der');
            $table->string('cilindro_izq');
            $table->string('cilindro_der');
            $table->string('eje_izq');
            $table->string('eje_der');
            $table->string('adicion_izq');
            $table->string('adicion_der');
            $table->string('dnp_izq');
            $table->string('dnp_der');
            $table->string('altura_izq');
            $table->string('altura_der');
            $table->longText('description');
            $table->longText('attachments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
