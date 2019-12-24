<?php

namespace App\Http\Requests;

use App\CourseSubject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseSubjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_subjects,id',
        ];
    }
}
