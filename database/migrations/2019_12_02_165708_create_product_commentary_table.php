<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCommentaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_commentary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_product');
            $table->text('commentary');
            $table->boolean('state');//No se si quieras utilizar el Softdelete baby
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
        Schema::dropIfExists('product_commentary');
    }
}
