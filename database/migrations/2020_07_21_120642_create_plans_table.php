<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('price');
            $table->string('short_desc', 255);
            $table->longText('long_desc');
            $table->string('banner_img', 255);
            $table->string('feature_img', 255);
            $table->integer('price_per_day');
            $table->integer('price_per_month');
            $table->string('feature', 255);
            $table->longText('long_feature');
            $table->string('menu_sample', 255)->default('NULL');
            $table->string('paln_table', 255)->default('NULL');
            $table->string('color', 255);
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
        Schema::dropIfExists('plans');
    }
}
