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
        Schema::create('Agents_Sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sites_id');
            $table->unsignedBigInteger('agents_id');
            $table->foreign('sites_id')->references('id')->on('sites');
            $table->foreign('agents_id')->references('id')->on('agents');
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
        Schema::dropIfExists('Agents_Sites');
    }
};
