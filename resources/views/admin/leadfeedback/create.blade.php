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

                        <a class="btn btn-secondary" href="{{ route('admin.leadfeedback.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.leadfeedback.store') }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name"> Lead <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name="lead_id">
                                <option  value="" hidden selected>Select Lead...</option>
                                @foreach ($lead as $index => $item)
                                    <option value="{{$item->id}}">{!! $item->subject !!}</option>
                                @endforeach
                            </select>
                            @error('lead_id') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name"> User <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name="user_id">
                                <option  value="" hidden selected>Select User...</option>
                                @foreach ($user as $index => $item)
                                    <option value="{{$item->id}}">{{  $item->name  }}</option>
                                @endforeach
                            </select>
                            @error('user_id') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="comment"> Comment <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('comment') is-invalid @enderror" type="text" name="comment" id="comment" value="{{ old('comment') }}"/>
                            @error('comment') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="reminder_date"> Reminder Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('reminder_date') is-invalid @enderror" type="date" name="reminder_date" id="reminder_date" value="{{ old('reminder_date') }}"/>
                            @error('reminder_date') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="reminder_time"> Reminder Time <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('reminder_time') is-invalid @enderror" type="time" name="reminder_time" id="reminder_time" value="{{ old('reminder_time') }}"/>
                            @error('reminder_time') {{ $message ?? '' }} @enderror
                        </div>












                </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Feedback</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.leadfeedback.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
