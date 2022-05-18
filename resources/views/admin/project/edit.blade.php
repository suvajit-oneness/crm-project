@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <h3 class="tile-title">{{ $subTitle }}</h3>
            <form action="{{ route('admin.project.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf


                <div class="tile-body">




                    <div class="form-group">
                        <label class="control-label" for="title">Title </label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetproject->title) }}" />

                        @error('title') {{ $message }} @enderror

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="slug">Slug </label>
                        <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $targetproject->slug) }}" />

                        @error('slug') {{ $message }} @enderror

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="price">Price </label>
                        <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price', $targetproject->price) }}" />

                        @error('price') {{ $message }} @enderror

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="start_date">Start Date</label>
                        <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{ old('start_date', $targetproject->start_date) }}" />

                        @error('start_date') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="end_date">End Date </label>
                        <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date', $targetproject->end_date) }}" />

                        @error('end_date') {{ $message }} @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="deadline">DeadLine </label>
                        <input class="form-control @error('deadline') is-invalid @enderror" type="date" name="deadline" id="deadline" value="{{ old('deadline', $targetproject->deadline) }}" />

                        @error('deadline') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $targetproject->description) }}" />

                        @error('description') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="progress">Progress</label>
                        <input class="form-control @error('progress') is-invalid @enderror" type="text" name="progress" id="progress" value="{{ old('progress', $targetproject->progress) }}" />

                        @error('progress') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($targetproject->files != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('File/'.$targetproject->files) }}" id="blogImage" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Files</label>
                                <input class="form-control @error('files') is-invalid @enderror" type="file" id="files" name="files" />
                                @error('files') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <input type="hidden" name="id" value="{{ $targetproject->id }}">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Project</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.project.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection