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
        Schema::create('teacher_schedule', function (Blueprint $table) {
            $table->id();
            $table->boolean('saturday');
            $table->string('start_saturday');
            $table->string('end_saturday');
            $table->boolean('sunday');
            $table->string('start_sunday');
            $table->string('end_sunday');
            $table->boolean('monday');
            $table->string('start_monday');
            $table->string('end_monday');
            $table->boolean('tuesday');
            $table->string('start_tuesday');
            $table->string('end_tuesday');
            $table->boolean('wednsday');
            $table->string('start_wednsday');
            $table->string('end_wednsday');
            $table->boolean('thursday');
            $table->string('start_thursday');
            $table->string('end_thursday');
            $table->boolean('friday');
            $table->string('start_friday');
            $table->string('end_friday');
            $table->foreignId('academy_teacher_id')->constrained('academy_teacher')->cascadeOnDelete();
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
        Schema::dropIfExists('teacher_schedules');
    }
};
