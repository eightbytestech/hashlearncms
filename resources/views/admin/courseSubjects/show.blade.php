@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseSubject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseSubject.fields.id') }}
                        </th>
                        <td>
                            {{ $courseSubject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseSubject.fields.name') }}
                        </th>
                        <td>
                            {{ $courseSubject->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseSubject.fields.slug') }}
                        </th>
                        <td>
                            {{ $courseSubject->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseSubject.fields.category') }}
                        </th>
                        <td>
                            @foreach($courseSubject->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection