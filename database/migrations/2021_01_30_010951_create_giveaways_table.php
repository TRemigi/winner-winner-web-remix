<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiveawaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giveaways', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name');
            $table->boolean('complete')->default(false);

            // $table->foreign('participant_id')
            //     ->references('id')
            //     ->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giveaways');
    }
}
