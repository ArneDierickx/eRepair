<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('type', ['laptop', 'smartphone', 'other']);
            $table->string('status');
            $table->text('confirmation_desc')->nullable();
            $table->string('username');
            $table->timestamps();
        });

        Schema::table('devices', function (Blueprint $table) {
            $table->foreign('username')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
