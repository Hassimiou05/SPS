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
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->date('rest_day');
            $table->enum('shift', ['day', 'night']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plannings');
    }
};
