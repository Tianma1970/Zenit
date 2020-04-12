<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id()->nullable();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('points')->nullable();
            $table->bigInteger('program_id')->nullable();
            $table->text('goal')->nullable();
            $table->text('knowledge')->nullable();
            $table->text('skills')->nullable();
            $table->text('competence')->nullable();
            $table->text('forms')->nullable();
            $table->text('literature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
