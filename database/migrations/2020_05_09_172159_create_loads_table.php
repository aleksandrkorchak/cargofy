<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_from_id');
            $table->unsignedBigInteger('city_to_id');
            $table->json('name');
            $table->unsignedFloat('volume');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('city_from_id')
                    ->references('id')
                    ->on('cities');
            $table->foreign('city_to_id')
                    ->references('id')
                    ->on('cities');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loads');
    }
}
