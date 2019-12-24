<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CourseSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseSubjectRequest;
use App\Http\Requests\UpdateCourseSubjectRequest;
use App\Http\Resources\Admin\CourseSubjectResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseSubjectApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseSubjectResource(CourseSubject::with(['categories'])->get());
    }

    public function store(StoreCourseSubjectRequest $request)
    {
        $courseSubject = CourseSubject::create($request->all());
        $courseSubject->categories()->sync($request->input('categories', []));

        return (new CourseSubjectResource($courseSubject))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseSubject $courseSubject)
    {
        abort_if(Gate::denies('course_subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseSubjectResource($courseSubject->load(['categories']));
    }

    public function update(UpdateCourseSubjectRequest $request, CourseSubject $courseSubject)
    {
        $courseSubject->update($request->all());
        $courseSubject->categories()->sync($request->input('categories', []));

        return (new CourseSubjectResource($courseSubject))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseSubject $courseSubject)
    {
        abort_if(Gate::denies('course_subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseSubject->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
