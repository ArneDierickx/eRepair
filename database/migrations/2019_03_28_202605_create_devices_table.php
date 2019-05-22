<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// migration for devices table
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
            $table->string('type');
            $table->string('status');
            $table->text('confirmation_desc')->nullable();
            // unsigned because otherwise running this migration would fail
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        // separate statement for creating foreign keys, otherwise running this migration would fail
        Schema::table('devices', function (Blueprint $table) {
            // user_id has to be a value in users table
            $table->foreign('user_id')->references('id')->on('users');
            // device type has to be a valid type from types table
            $table->foreign('type')->references('type')->on('types');
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
