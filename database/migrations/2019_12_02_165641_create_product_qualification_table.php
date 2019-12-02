<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_qualification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_product');
            $table->enum('qualificaion',[0,1,2,3,4,5,6,7,8,9,10]);
            $table->boolean('state');
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
        Schema::dropIfExists('product_qualification');
    }
}
