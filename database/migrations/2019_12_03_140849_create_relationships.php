<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->foreign('type_document_id')->references('id')->on('type_document')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('city')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('state')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade');
        });
        Schema::table('department', function ($table) {
            $table->foreign('country_id')->references('id')->on('country')->onUpdate('cascade');
        });
        Schema::table('city', function ($table) {
            $table->foreign('department_id')->references('id')->on('department')->onUpdate('cascade');
        });
        Schema::table('state', function ($table) {
            $table->foreign('type_state_id')->references('id')->on('type_state')->onUpdate('cascade');
        });
        Schema::table('product', function ($table) {
            $table->foreign('category_id')->references('id')->on('category')->onUpdate('cascade');
        });
        Schema::table('order', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('invoice_id')->references('id')->on('product_invoice')->onUpdate('cascade');
        });
        Schema::table('list_order', function ($table) {
            $table->foreign('order_id')->references('id')->on('order')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onUpdate('cascade');
        });
        Schema::table('product_favorite', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onUpdate('cascade');
        });
        Schema::table('product_qualification', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onUpdate('cascade');
        });
        Schema::table('product_commentary', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onUpdate('cascade');
        });
        Schema::table('product_invoice', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
        Schema::table('invoice_list_product', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('product_invoice')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
