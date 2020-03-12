<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('goal');
            $table->text('knowledge');
            $table->text('skills');
            $table->text('competence');
            $table->text('forms');
            $table->text('literature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('goal');
            $table->dropColumn('knowledge');
            $table->dropColumn('skills');
            $table->dropColumn('competence');
            $table->dropColumn('forms');
            $table->dropColumn('literature');
        });
    }
}
