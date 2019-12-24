<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('course_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('slug')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
