<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodpackages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',128)->unique();
            $table->string('barcode',128)->unique();
            $table->text('description')->nullable();
            $table->string('imagepath',255)->nullable();
            $table->double('price')->default(0);
            $table->integer('kCal');
            $table->integer('protein');
            $table->integer('fats');
            $table->integer('carbohydrates');
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
        Schema::dropIfExist('foodpackeages');
    }
}
