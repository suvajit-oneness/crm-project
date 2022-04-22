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
                <h3 class="tile-title">{{ $subTitle }}
                    <span class="top-form-btn">

                        <a class="btn btn-secondary" href="{{ route('admin.certificate.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.certificate.store') }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                         <div class="form-group">
                            <label class="control-label" for="name_prefix"> Prefix  <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name="gender">
                                <option value="" hidden selected>Select...</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('name_prefix') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="first_name"> First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"/>
                            @error('first_name') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="last_name"> Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"/>
                            @error('last_name') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="email">  Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}"/>
                            @error('email') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="phone"> Phone  <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}"/>
                            @error('phone') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="start_date"> Start Date  <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"/>
                            @error('start_date') {{ $message ?? '' }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="end_date"> End Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"/>
                            @error('end_date') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title"> Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="grade"> Grade <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('grade') is-invalid @enderror" type="text" name="grade" id="grade" value="{{ old('grade') }}"/>
                            @error('grade') {{ $message ?? '' }} @enderror
                        </div>
                   </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Certificate</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.certificate.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
