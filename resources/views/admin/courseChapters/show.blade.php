@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseChapter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-chapters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseChapter.fields.id') }}
                        </th>
                        <td>
                            {{ $courseChapter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseChapter.fields.name') }}
                        </th>
                        <td>
                            {{ $courseChapter->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseChapter.fields.slug') }}
                        </th>
                        <td>
                            {{ $courseChapter->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseChapter.fields.chapter') }}
                        </th>
                        <td>
                            {{ $courseChapter->chapter->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseChapter.fields.chapter_group') }}
                        </th>
                        <td>
                            {{ $courseChapter->chapter_group->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseChapter.fields.content') }}
                        </th>
                        <td>
                            {{ $courseChapter->content }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-chapters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection