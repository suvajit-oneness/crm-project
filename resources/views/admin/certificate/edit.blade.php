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
                <form action="{{ route('admin.certificate.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf


                        <div class="tile-body">




                        <div class="form-group">
                            <label class="control-label" for="name_prefix"> Prefix  <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name="name_prefix">
                                <option value="" hidden selected>Select...</option>
                                <option value="Mr" {{ ($cer->name_prefix == "Mr") ? 'selected' : '' }}>Mr</option>
                                <option value="Mrs" {{ ($cer->name_prefix == "Mrs") ? 'selected' : '' }}>Mrs</option>
                                <option value="Miss" {{ ($cer->name_prefix == "Miss") ? 'selected' : '' }}>Miss</option>
                                <option value="other" {{ ($cer->name_prefix == "other") ? 'selected' : '' }}>other</option>
                            </select>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('name_prefix') {{ $message }} @enderror

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="first_name"> First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{ old('first_name', $cer->first_name) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('first_name') {{ $message }} @enderror

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="last_name"> Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{ old('last_name', $cer->last_name) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('last_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">  Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email', $cer->email) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('email') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="phone"> Phone  <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone', $cer->phone) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('phone') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="start_date"> Start Date  <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{ old('start_date', $cer->start_date) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('start_date') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="end_date"> End Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date', $cer->end_date) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('end_date') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title"> Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $cer->title) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="grade"> Grade <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('grade') is-invalid @enderror" type="text" name="grade" id="grade" value="{{ old('grade', $cer->grade) }}"/>
                            <input type="hidden" name="id" value="{{ $cer->id }}">
                            @error('grade') {{ $message }} @enderror
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update certificate</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.certificate.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
