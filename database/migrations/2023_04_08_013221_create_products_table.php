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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('product_name', 150)->nullable();
            $table->text('descript')->nullable();
            $table->char('url_slug', 150)->nullable();
            $table->bigInteger('product_price')->nullable();
            $table->bigInteger('rrp')->nullable();
            $table->bigInteger('product_quantity')->nullable();
            $table->smallInteger('category_id')->nullable();
            $table->char('media_id')->nullable();
            $table->string('product_weight')->nullable();
            $table->smallInteger('stats')->nullable();
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
        Schema::dropIfExists('products');
    }
};
