<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmssentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smssents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->string('username')->default('mtshoes');
             $table->string('password')->default('76PCMA9D');
             $table->unsignedBigInteger('smstype_id')->default(2);
             $table->float('blance',8,2)->default('0');
             $table->float('smsrate',8,2)->default('0.25');
            $table->tinyInteger('newcustomer')->default(0);
            $table->string('newcustomermessage',500)->nullable();
            $table->tinyInteger('billing')->default(0);
            $table->string('billingmessage',500)->nullable();
            $table->tinyInteger('payment')->default(0);
            $table->string('paymentmessage',500)->nullable();
            $table->tinyInteger('openticket')->default(0);
            $table->string('openticketmessage',500)->nullable();
            $table->tinyInteger('assignticket')->default(0);
            $table->string('assignticketmessage',500)->nullable();
            $table->tinyInteger('updateticket')->default(0);
            $table->string('updateticketmessage',500)->nullable();
            $table->tinyInteger('employee')->default(0);
            $table->string('employeemessage',500)->nullable();
            $table->tinyInteger('closeticket')->default(0);
            $table->string('closeticketmessage',500)->nullable();
            $table->tinyInteger('problem')->default(0);
           $table->string('problemmessage',500)->nullable();
           $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('smssents');
    }
}
