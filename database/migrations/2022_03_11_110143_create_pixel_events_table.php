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
        Schema::create('pixel_events', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('event_type_id')->unsigned()->nullable();
            $table->foreign('event_type_id')->references('id')->on('pixel_event_types');
            $table->bigInteger('visit_id')->unsigned()->nullable();
            $table->foreign('visit_id')->references('id')->on('pixel_visits');
            $table->jsonb('value')->nullable();
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
        Schema::dropIfExists('pixel_event_list');
    }
};
