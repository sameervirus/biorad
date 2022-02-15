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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('category_slug');
            $table->string('type')->nullable();
            $table->string('by')->nullable();
            $table->string('area')->nullable();
            $table->date('training_date')->nullable();
            $table->string('training_time')->nullable();
            $table->text('description')->nullable();
            $table->string('photo_path', 100)->nullable();
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
        Schema::dropIfExists('trainings');
    }
};
