<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->bigInteger('phone_number');
            $table->string('email');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('member_id');
            $table->enum('status', ['Yes', 'no'])->default('no');
             $table->enum('is_verified', ['Yes', 'no'])->default('no');

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
        Schema::dropIfExists('elections');
    }
};
