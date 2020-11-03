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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('organization');
            $table->string('street');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('license_key');
            $table->string('expire_date');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
