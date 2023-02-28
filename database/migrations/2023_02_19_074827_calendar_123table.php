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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id('calendar_id');
            $table->date('checkin_date')->nullable();
            $table->date('checkout_date')->nullable();
            $table->date('invalid_date')->nullable();
            $table->date('available_date')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('calendars');
    }
};
