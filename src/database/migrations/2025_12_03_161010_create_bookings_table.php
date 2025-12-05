<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();

            $table->string('name');
            $table->string('email');
            $table->string('tel')->nullable();

            $table->date('date');
            $table->string('time');

            // 表示用コース名（Course 名称コピー）
            $table->string('course');
            $table->integer('duration');
            $table->integer('price');

            $table->text('notes')->nullable();

            $table->enum('status', ['pending', 'confirmed', 'done'])
                ->default('pending');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->nullOnDelete();

            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
