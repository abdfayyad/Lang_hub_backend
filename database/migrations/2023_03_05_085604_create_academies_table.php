<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->string('license_number');
            $table->boolean('english');
            $table->boolean('germany');
            $table->boolean('spanish');
            $table->boolean('french');
            $table->string('image')->nullable();
            $table->integer('delete_time')->default(4);
            $table->foreignId('adminstrator_id')->constrained('academy_adminstrators')->cascadeOnDelete();
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
        Schema::dropIfExists('academies');
    }
}
