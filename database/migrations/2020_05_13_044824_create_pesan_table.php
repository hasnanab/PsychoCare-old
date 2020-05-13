<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->text('pesan');
            $table->integer('from');
            $table->foreign('from')->references('id')->on('user');
            $table->integer('to');
            $table->foreign('to')->references('id')->on('user');
            $table->boolean('is_read');
            $table->integer('room_chat');
            $table->foreign('room_chat')->references('id')->on('chat_mapping')
            ->onDelete('cascade');
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
        Schema::dropIfExists('pesan');
    }
}
