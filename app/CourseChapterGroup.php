<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseChapterGroup extends Model
{
    use SoftDeletes;

    public $table = 'course_chapter_groups';

    public static $searchable = [
        'name',
        'slug',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'subject_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function chapterGroupCourseChapters()
    {
        return $this->hasMany(CourseChapter::class, 'chapter_group_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(CourseSubject::class, 'subject_id');
    }
}
