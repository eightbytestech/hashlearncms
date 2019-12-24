<?php

namespace App\Http\Requests;

use App\CourseChapter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCourseChapterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_chapter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
