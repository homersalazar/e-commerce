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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->char('codes', 150)->nullable();
            $table->smallInteger('category_id')->nullable();
            $table->smallInteger('product_id')->nullable();
            $table->char('discount_types', 150)->nullable();
            $table->smallInteger('discount_val')->nullable();
            $table->date('start_dates')->nullable();
            $table->date('end_dates')->nullable();
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
        Schema::dropIfExists('discounts');
    }
};
