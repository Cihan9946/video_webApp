<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('userUID')->nullable();
            $table->string('userFullName')->nullable();
            $table->string('userFirstName')->nullable();
            $table->string('userLastName')->nullable();
            $table->string('userEMailAddress')->unique()->nullable();
            $table->string('userLogonName')->nullable();
            $table->string('userOfficeLocation')->nullable();
            $table->string('userTitle')->nullable();
            $table->string('userTelephoneNumber')->nullable();
            $table->string('userGender')->nullable();
            $table->string('userDescription')->nullable();
            $table->string('userLogonNamePreWindows2000')->nullable();
            $table->string('userDistinguishedName')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
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
