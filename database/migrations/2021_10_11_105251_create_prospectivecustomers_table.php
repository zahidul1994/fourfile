<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectivecustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospectivecustomers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone',60)->nullable();
            $table->string('address',500)->nullable();
            $table->string('email')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('prospectivecustomers');
    }
}
