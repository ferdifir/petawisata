<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePusatOlehOleh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pusat_oleh_oleh', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('location');
            $table->string('pict_url');
            $table->string('category');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('pusat_oleh_oleh');
    }
}