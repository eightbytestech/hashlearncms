<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSubject extends Model
{
    use SoftDeletes;

    public $table = 'course_subjects';

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
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subjectCourseChapterGroups()
    {
        return $this->hasMany(CourseChapterGroup::class, 'subject_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(CourseCategory::class);
    }
}
