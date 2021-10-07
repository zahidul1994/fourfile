<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->decimal('monthlyrent',8,2)->nullable();
            $table->decimal('due',20,2)->nullable();
            $table->decimal('addicrg',8,2)->nullable();
            $table->decimal('discount',8,2)->nullable();
            $table->decimal('advance',20,2)->nullable();
            $table->decimal('vat',8,2)->nullable();
            $table->decimal('paid',20,4)->default(0);
            $table->decimal('total',20,2)->nullable();
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
        Schema::dropIfExists('bills');
    }
}
