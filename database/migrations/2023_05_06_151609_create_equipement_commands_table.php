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
        if (!Schema::hasTable('equipement_commands')) {
            Schema::create('equipement_commands', function (Blueprint $table) {
                $table->unsignedBigInteger('equipment_id');
                $table->unsignedBigInteger('commande_id');
                $table->integer('quantite');
                $table->timestamps();

                $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
                $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipement_commands');
    }
};
