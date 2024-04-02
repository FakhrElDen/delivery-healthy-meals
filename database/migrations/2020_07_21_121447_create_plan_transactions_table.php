<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('promocode_id')->default(0)->unsigned()->index();
            $table->integer('plan_id')->unsigned()->index();
            $table->longText('menu')->nullable();
            $table->integer('price');
            $table->string('payment_status', 255);
            $table->string('ref_code', 255);
            $table->string('from', 255);
            $table->string('to', 255);
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
        Schema::dropIfExists('plan_transactions');
    }
}
