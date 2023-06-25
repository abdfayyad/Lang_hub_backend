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
        Schema::create('annual_schedules', function (Blueprint $table) {
            $table->id();
            $table->time('start_hour'); //12:30:00 // should be time not date
            $table->time('end_hour');   //14:30:00
            $table->string('day');      //[Saturday, ..]
            $table->date('start_date');  //01/07/2023 [dd/mm/yy]
            $table->date('end_date');    //30/07/2023 [dd/mm/yy]
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
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
        Schema::dropIfExists('annual_schedules');
    }
};
