<?php

namespace App\Http\Requests;

use App\CourseChapterGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCourseChapterGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_chapter_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
