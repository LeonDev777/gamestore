<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_users');
            $table->string('name');
            $table->string('image_path');
            $table-> decimal('price',$precision = 8, $scale = 2);
            $table->text('description');
            $table->timestamps();

            $table->foreign('fk_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hides');
    }
}
