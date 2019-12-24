<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CourseChapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseChapterRequest;
use App\Http\Requests\UpdateCourseChapterRequest;
use App\Http\Resources\Admin\CourseChapterResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseChapterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseChapterResource(CourseChapter::with(['chapter', 'chapter_group'])->get());
    }

    public function store(StoreCourseChapterRequest $request)
    {
        $courseChapter = CourseChapter::create($request->all());

        return (new CourseChapterResource($courseChapter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseChapter $courseChapter)
    {
        abort_if(Gate::denies('course_chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseChapterResource($courseChapter->load(['chapter', 'chapter_group']));
    }

    public function update(UpdateCourseChapterRequest $request, CourseChapter $courseChapter)
    {
        $courseChapter->update($request->all());

        return (new CourseChapterResource($courseChapter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseChapter $courseChapter)
    {
        abort_if(Gate::denies('course_chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseChapter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
