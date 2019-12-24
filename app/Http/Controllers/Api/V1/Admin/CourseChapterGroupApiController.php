<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CourseChapterGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseChapterGroupRequest;
use App\Http\Requests\UpdateCourseChapterGroupRequest;
use App\Http\Resources\Admin\CourseChapterGroupResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseChapterGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_chapter_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseChapterGroupResource(CourseChapterGroup::with(['subject'])->get());
    }

    public function store(StoreCourseChapterGroupRequest $request)
    {
        $courseChapterGroup = CourseChapterGroup::create($request->all());

        return (new CourseChapterGroupResource($courseChapterGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseChapterGroup $courseChapterGroup)
    {
        abort_if(Gate::denies('course_chapter_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseChapterGroupResource($courseChapterGroup->load(['subject']));
    }

    public function update(UpdateCourseChapterGroupRequest $request, CourseChapterGroup $courseChapterGroup)
    {
        $courseChapterGroup->update($request->all());

        return (new CourseChapterGroupResource($courseChapterGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseChapterGroup $courseChapterGroup)
    {
        abort_if(Gate::denies('course_chapter_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseChapterGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
