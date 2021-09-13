<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaindetilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaindetils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('complain_id')->unsigned()->nullable();
            $table->foreign('complain_id')->references('id')->on('complains')->onDelete('cascade');
            $table->string('message',500)->nullable();
            $table->string('replymessage',500)->nullable();
            $table->string('messageby')->nullable();
            $table->tinyInteger('adminseen')->default(0);
            $table->tinyInteger('userseen')->default(0);
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
        Schema::dropIfExists('complaindetils');
    }
}
