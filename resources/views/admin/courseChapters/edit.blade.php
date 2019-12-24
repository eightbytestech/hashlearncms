@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.courseChapter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-chapters.update", [$courseChapter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.courseChapter.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $courseChapter->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapter.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.courseChapter.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $courseChapter->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapter.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chapter_id">{{ trans('cruds.courseChapter.fields.chapter') }}</label>
                <select class="form-control select2 {{ $errors->has('chapter') ? 'is-invalid' : '' }}" name="chapter_id" id="chapter_id">
                    @foreach($chapters as $id => $chapter)
                        <option value="{{ $id }}" {{ ($courseChapter->chapter ? $courseChapter->chapter->id : old('chapter_id')) == $id ? 'selected' : '' }}>{{ $chapter }}</option>
                    @endforeach
                </select>
                @if($errors->has('chapter_id'))
                    <span class="text-danger">{{ $errors->first('chapter_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapter.fields.chapter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chapter_group_id">{{ trans('cruds.courseChapter.fields.chapter_group') }}</label>
                <select class="form-control select2 {{ $errors->has('chapter_group') ? 'is-invalid' : '' }}" name="chapter_group_id" id="chapter_group_id">
                    @foreach($chapter_groups as $id => $chapter_group)
                        <option value="{{ $id }}" {{ ($courseChapter->chapter_group ? $courseChapter->chapter_group->id : old('chapter_group_id')) == $id ? 'selected' : '' }}>{{ $chapter_group }}</option>
                    @endforeach
                </select>
                @if($errors->has('chapter_group_id'))
                    <span class="text-danger">{{ $errors->first('chapter_group_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapter.fields.chapter_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.courseChapter.fields.content') }}</label>
                <input class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" type="text" name="content" id="content" value="{{ old('content', $courseChapter->content) }}">
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseChapter.fields.content_helper') }}</span>
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