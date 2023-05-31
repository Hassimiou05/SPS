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
        if (!Schema::hasTable('abscence_agent')) {
            Schema::create('abscence_agent', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('abscence_id');
                $table->unsignedBigInteger('agent_id');
                $table->integer('nbre_jour')->default(0)->nullable();
                $table->boolean('validé')->default(false);
                $table->timestamps();
                $table->foreign('abscence_id')->references('id')->on('absences')->onDelete('cascade');
                $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('abscence_agent');
    }
};
