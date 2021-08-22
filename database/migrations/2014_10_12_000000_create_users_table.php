<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');   
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->integer('phone')->unique();
            $table->string('image')->nullable();
            $table->string('fulladdress')->nullable();
           $table->timestamp('email_verified_at')->nullable();
            $table->string('api_token')->nullable();
            $table->integer('otp')->nullable();
			$table->tinyInteger('status')->default(2);
           $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
