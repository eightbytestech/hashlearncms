<?php

namespace App\Http\Controllers\Admin;

use App\CourseCategory;
use App\CourseSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseSubjectRequest;
use App\Http\Requests\StoreCourseSubjectRequest;
use App\Http\Requests\UpdateCourseSubjectRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseSubjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = CourseSubject::with(['categories'])->select(sprintf('%s.*', (new CourseSubject)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'course_subject_show';
                $editGate      = 'course_subject_edit';
                $deleteGate    = 'course_subject_delete';
                $crudRoutePart = 'course-subjects';

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
            $table->editColumn('category', function ($row) {
                $labels = [];

                foreach ($row->categories as $category) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $category->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'category']);

            return $table->make(true);
        }

        return view('admin.courseSubjects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CourseCategory::all()->pluck('name', 'id');

        return view('admin.courseSubjects.create', compact('categories'));
    }

    public function store(StoreCourseSubjectRequest $request)
    {
        $courseSubject = CourseSubject::create($request->all());
        $courseSubject->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.course-subjects.index');
    }

    public function edit(CourseSubject $courseSubject)
    {
        abort_if(Gate::denies('course_subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CourseCategory::all()->pluck('name', 'id');

        $courseSubject->load('categories');

        return view('admin.courseSubjects.edit', compact('categories', 'courseSubject'));
    }

    public function update(UpdateCourseSubjectRequest $request, CourseSubject $courseSubject)
    {
        $courseSubject->update($request->all());
        $courseSubject->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.course-subjects.index');
    }

    public function show(CourseSubject $courseSubject)
    {
        abort_if(Gate::denies('course_subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseSubject->load('categories');

        return view('admin.courseSubjects.show', compact('courseSubject'));
    }

    public function destroy(CourseSubject $courseSubject)
    {
        abort_if(Gate::denies('course_subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseSubject->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseSubjectRequest $request)
    {
        CourseSubject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
