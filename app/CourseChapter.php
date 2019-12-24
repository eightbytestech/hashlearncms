<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseChapter extends Model
{
    use SoftDeletes;

    public $table = 'course_chapters';

    public static $searchable = [
        'name',
        'slug',
        'content',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'content',
        'chapter_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'chapter_group_id',
    ];

    public function chapterCourseChapters()
    {
        return $this->hasMany(CourseChapter::class, 'chapter_id', 'id');
    }

    public function chapter()
    {
        return $this->belongsTo(CourseChapter::class, 'chapter_id');
    }

    public function chapter_group()
    {
        return $this->belongsTo(CourseChapterGroup::class, 'chapter_group_id');
    }
}
