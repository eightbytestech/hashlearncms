<?php

namespace App\Http\Controllers\Admin;

use App\CourseChapterGroup;
use App\CourseSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseChapterGroupRequest;
use App\Http\Requests\StoreCourseChapterGroupRequest;
use App\Http\Requests\UpdateCourseChapterGroupRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseChapterGroupController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = CourseChapterGroup::with(['subject'])->select(sprintf('%s.*', (new CourseChapterGroup)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'course_chapter_group_show';
                $editGate      = 'course_chapter_group_edit';
                $deleteGate    = 'course_chapter_group_delete';
                $crudRoutePart = 'course-chapter-groups';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : "";
            });
            $table->addColumn('subject_name', function ($row) {
                return $row->subject ? $row->subject->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'subject']);

            return $table->make(true);
        }

        return view('admin.courseChapterGroups.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_chapter_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = CourseSubject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseChapterGroups.create', compact('subjects'));
    }

    public function store(StoreCourseChapterGroupRequest $request)
    {
        $courseChapterGroup = CourseChapterGroup::create($request->all());

        return redirect()->route('admin.course-chapter-groups.index');
    }

    public function edit(CourseChapterGroup $courseChapterGroup)
    {
        abort_if(Gate::denies('course_chapter_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = CourseSubject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseChapterGroup->load('subject');

        return view('admin.courseChapterGroups.edit', compact('subjects', 'courseChapterGroup'));
    }

    public function update(UpdateCourseChapterGroupRequest $request, CourseChapterGroup $courseChapterGroup)
    {
        $courseChapterGroup->update($request->all());

        return redirect()->route('admin.course-chapter-groups.index');
    }

    public function show(CourseChapterGroup $courseChapterGroup)
    {
        abort_if(Gate::denies('course_chapter_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseChapterGroup->load('subject');

        return view('admin.courseChapterGroups.show', compact('courseChapterGroup'));
    }

    public function destroy(CourseChapterGroup $courseChapterGroup)
    {
        abort_if(Gate::denies('course_chapter_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseChapterGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseChapterGroupRequest $request)
    {
        CourseChapterGroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
