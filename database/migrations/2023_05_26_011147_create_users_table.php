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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->date('date_naissance')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->date('date_inscription')->nullable();
            $table->string('profession')->nullable();
            $table->string('image')->nullable();
            $table->integer('phone');
            $table->unsignedBigInteger('comite_id')->nullable();
            $table->foreign('comite_id')->references('id')->on('comites')->onDelete('SET NULL');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('SET NULL');
            $table->string('status');
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
};
