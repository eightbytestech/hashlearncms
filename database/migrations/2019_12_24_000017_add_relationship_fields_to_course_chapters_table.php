<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseChaptersTable extends Migration
{
    public function up()
    {
        Schema::table('course_chapters', function (Blueprint $table) {
            $table->unsignedInteger('chapter_id')->nullable();

            $table->foreign('chapter_id', 'chapter_fk_777683')->references('id')->on('course_chapters');

            $table->unsignedInteger('chapter_group_id')->nullable();

            $table->foreign('chapter_group_id', 'chapter_group_fk_777684')->references('id')->on('course_chapter_groups');
        });
    }
}
