<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price');
            $table->integer('qty');
            $table->enum('status',['Available', 'Not Available', 'Not Available In Your Country']);


            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->
            references('id')
            ->on('brands');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->
            references('id')
            ->on('categories');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->
            references('id')
            ->on('sub_categories');            

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
    //   $table->dropForeign('products_brand_id_foreign');
    //   $table->dropColumn('brand_id');

    //   $table->dropForeign('products_category_id_foreign');
    //   $table->dropColumn('category_id');
    //   $table->dropForeign('products_sub_category_id_foreign');
    //   $table->dropColumn('sub_category_id');
    }
}
