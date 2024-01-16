<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('azienda');
            $table->string('stazione_di_partenza');
            $table->string('stazione_di_arrivo');
            $table->date('data_di_partenza');
            $table->time('orario_di_partenza');
            $table->date('data_di_arrivo');
            $table->time('orario_di_arrivo');
            $table->smallInteger('codice_treno')->unsigned();
            $table->tinyInteger('carrozze_numero')->unsigned();
            $table->boolean('in_orario')->default(true);
            $table->boolean('e_cancellato')->default(false);
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
        Schema::dropIfExists('trains');
    }
};
