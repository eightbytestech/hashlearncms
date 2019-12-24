<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseChapterGroupsTable extends Migration
{
    public function up()
    {
        Schema::table('course_chapter_groups', function (Blueprint $table) {
            $table->unsignedInteger('subject_id')->nullable();

            $table->foreign('subject_id', 'subject_fk_777677')->references('id')->on('course_subjects');
        });
    }
}
