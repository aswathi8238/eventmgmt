<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('esessions', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('speaker',255);
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('event_ref')->unsigned();
            $table->foreign('event_ref')->references('event_id')->on('events')->onDelete('cascade');
              $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esessions');
    }
};
