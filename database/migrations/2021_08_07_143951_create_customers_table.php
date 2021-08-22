<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
           $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('customername');
            $table->string('loginid')->unique();
           $table->string('contactperson')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('infoimage')->nullable();
            $table->string('path')->nullable();
            $table->string('idnumber')->nullable();
            $table->string('idnumbertype')->nullable();
            $table->string('otheridtype')->nullable();
           $table->string('customermobile')->nullable();
            $table->string('customeraltmobile')->nullable();
            $table->string('customerprofession')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('thana_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('buildingname')->nullable();
            $table->string('houseno')->nullable();
            $table->string('floor')->nullable();
            $table->string('post')->nullable();
            $table->string('apt')->nullable();
            $table->date('connectiondate')->nullable();
            $table->string('mikrotic_id')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('type_id')->nullable();
            $table->macAddress('mac')->nullable();
            $table->string('bandwidth')->nullable();
            $table->string('atd_day')->nullable();
            $table->string('atd_month')->nullable();
            $table->string('sqn')->nullable();
            $table->string('interfacename')->nullable();
            $table->string('profile_id')->nullable();
            $table->string('secretname')->nullable();
            $table->string('scrtnamepass')->nullable();
            $table->string('ppcomment')->nullable();
            $table->string('remoteaddress')->nullable();
            $table->string('comment',500)->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->float('monthlyrent',8,2)->nullable();
            $table->float('due',20,2)->nullable();
            $table->float('addicrg',8,2)->nullable();
            $table->float('discount',8,2)->nullable();
            $table->float('advance',20,2)->nullable();
            $table->float('vat',8,2)->nullable();
            $table->float('total',20,2)->nullable();
            $table->string('prepaidpostpaid')->nullable();
            $table->string('connection')->nullable();
            $table->string('clienttype')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('dlp')->nullable();
            $table->string('description',2000)->nullable();
            $table->string('note',2000)->nullable();
            $table->string('connectedby')->nullable();
            $table->string('sdeposite')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
