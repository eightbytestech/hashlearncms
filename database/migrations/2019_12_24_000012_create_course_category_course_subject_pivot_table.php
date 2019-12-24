<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCategoryCourseSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_category_course_subject', function (Blueprint $table) {
            $table->unsignedInteger('course_subject_id');

            $table->foreign('course_subject_id', 'course_subject_id_fk_777467')->references('id')->on('course_subjects')->onDelete('cascade');

            $table->unsignedInteger('course_category_id');

            $table->foreign('course_category_id', 'course_category_id_fk_777467')->references('id')->on('course_categories')->onDelete('cascade');
        });
    }
}
