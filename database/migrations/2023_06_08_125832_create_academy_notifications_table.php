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
        Schema::create('academy_notifications', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('academy_id')->constrained('academies')->cascadeOnUpdate();
            $table->boolean('read')->default(0) ;
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
        Schema::dropIfExists('academy_notifications');
    }
};
