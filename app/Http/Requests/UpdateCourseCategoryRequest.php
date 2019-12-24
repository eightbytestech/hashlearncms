<?php

namespace App\Http\Requests;

use App\CourseCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCourseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
