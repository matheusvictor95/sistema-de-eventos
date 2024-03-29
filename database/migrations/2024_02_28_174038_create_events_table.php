<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("titulo");
            $table->text("descricao");
            $table->string("cidade");
            $table->boolean("privado");
            $table->string('image');
            $table->json('items');
            $table->dateTime('date');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
