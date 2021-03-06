@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
                    <tbody>
                        <tr>
                            <td>Lead</td>
                            <td>{!! $lead->lead? $lead->lead->subject : '' !!}</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td> {{$lead->user? $lead->user->name : ''}}</td>
                        </tr>

                        <tr>
                            <td>Comment</td>
                            <td>{{ empty($lead['comment'])? null:$lead['comment'] }}</td>
                        </tr>
                        <tr>
                            <td>Reminder Date</td>
                            <td>{{ empty($lead['reminder_date'])? null:$lead['reminder_date'] }}</td>
                        </tr>
                        <tr>
                            <td>Reminder Time</td>
                            <td>{{ empty($lead['reminder_time'])? null:$lead['reminder_time'] }}</td>
                        </tr>

                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('admin.leadfeedback.index') }}">Back</a>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <p>Loop List</p>
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Created By</th>
                                <th> Content </th>
                                <th>Created At</th>
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->loops as $key => $business)
                                <tr>
                                    <td>{{ $business->id }}</td>
                                    <td>{{ $business->user->name }}</td>
                                    <td>{{ $business->content }}</td>
                                    <td>{{ date("d-M-Y h:i a",strtotime($business->created_at)) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">

                                            <a href="{{ route('admin.loop.details', $business['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                            <a href="#" data-id="{{$business['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
