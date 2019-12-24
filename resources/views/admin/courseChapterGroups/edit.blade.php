@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.courseChapterGroup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-chapter-groups.update", [$courseChapterGroup->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.courseChapterGroup.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $courseChapterGroup->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapterGroup.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.courseChapterGroup.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $courseChapterGroup->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapterGroup.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject_id">{{ trans('cruds.courseChapterGroup.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id">
                    @foreach($subjects as $id => $subject)
                        <option value="{{ $id }}" {{ ($courseChapterGroup->subject ? $courseChapterGroup->subject->id : old('subject_id')) == $id ? 'selected' : '' }}>{{ $subject }}</option>
                    @endforeach
                </select>
                @if($errors->has('subject_id'))
                    <span class="text-danger">{{ $errors->first('subject_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapterGroup.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection