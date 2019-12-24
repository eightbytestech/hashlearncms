<?php

namespace App\Http\Requests;

use App\CourseCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCourseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
