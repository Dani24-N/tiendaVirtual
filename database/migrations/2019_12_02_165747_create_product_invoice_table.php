<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('invoice_number');
            $table->date('date_create');
            $table->float('total');
            $table->enum('estado',['Abierto','pagado','Cancelado']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_invoice');
    }
}
