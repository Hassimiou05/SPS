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
        if (!Schema::hasTable('equipements')) {
            Schema::create('equipements', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('type_id');
                $table->string('modele');
                $table->string('description');
                $table->unsignedBigInteger('fournisseur_id');
                $table->integer('quantite');
                $table->timestamps();

                $table->foreign('type_id')->references('id')->on('type_equipements')->onDelete('cascade');
                $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
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
        Schema::dropIfExists('equipements');
    }
};
