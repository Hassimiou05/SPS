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
        if (!Schema::hasTable('commandes')) {
            Schema::create('commandes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('fournisseur_id');
                $table->date('date_commande');
                $table->boolean('livrer')->default(false);
                $table->timestamps();

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
        Schema::dropIfExists('commandes');
    }
};
