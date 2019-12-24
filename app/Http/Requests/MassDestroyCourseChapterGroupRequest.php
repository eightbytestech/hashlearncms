<?php

namespace App\Http\Requests;

use App\CourseChapterGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseChapterGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_chapter_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_chapter_groups,id',
        ];
    }
}
