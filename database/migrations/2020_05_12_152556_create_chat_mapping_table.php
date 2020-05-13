<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_mapping', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('user');
            $table->integer('psikiater_id');
            $table->foreign('psikiater_id')->references('id')->on('user');
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
        Schema::dropIfExists('chat_mapping');
    }
}
