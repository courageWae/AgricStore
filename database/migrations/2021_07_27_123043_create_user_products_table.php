<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->string("price");
            $table->string("discount")->nullable()->default(0);
            $table->string("photo")->nullable();
            $table->string("category_id");
            $table->string("user_id");
            $table->string("product_id");
            $table->string("guest_id");
            $table->string("weight");
            $table->string("quantity")->nullable();
            $table->string("total_price")->nullable();
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
        Schema::dropIfExists('user_products');
    }
}
