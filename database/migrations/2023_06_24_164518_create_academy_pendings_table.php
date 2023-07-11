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
        Schema::create('academy_pendings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academy_adminstrator_id')->constrained('academy_adminstrators')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->string('license_number');
            $table->boolean('english');
            $table->boolean('germany');
            $table->boolean('spanish');
            $table->boolean('french');
            $table->string('photo');
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
        Schema::dropIfExists('academy_pending_lists');
    }
};
