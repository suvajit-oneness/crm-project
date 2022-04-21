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
                            <td>Project</td>
                            <td>{{ empty($lead->project->title)? null:$lead->project->title }}</td>
                        </tr>
                        <tr>
                            <td>Customer Name</td>
                            <td>{{ empty($lead['customer_name'])? null:$lead['customer_name'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Email</td>
                            <td>{{ empty($lead['customer_email'])? null:$lead['customer_email'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Mobile</td>
                            <td>{{ empty($lead['customer_mobile'])? null:$lead['customer_mobile'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Phone</td>
                            <td>{{ empty($lead['customer_phone'])? null:$lead['customer_phone'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Company</td>
                            <td>{{ empty($lead['customer_company'])? null:$lead['customer_company'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Website</td>
                            <td>{{ empty($lead['company_website'])? null:$lead['company_website'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Address</td>
                            <td>{{ empty($lead['customer_address'])? null:$lead['customer_address'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer City</td>
                            <td>{{ empty($lead['customer_city'])? null:$lead['customer_city'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer State</td>
                            <td>{{ empty($lead['customer_state'])? null:$lead['customer_state'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Country</td>
                            <td>{{ empty($lead['customer_country'])? null:$lead['customer_country'] }}</td>
                        </tr>
                        <tr>
                            <td>Customer Pincode</td>
                            <td>{{ empty($lead['customer_pin'])? null:$lead['customer_pin'] }}</td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>{!! $lead->subject !!}</td>
                        </tr>
                        <tr>
                            <td> Message</td>
                            <td>{!! $lead->message !!}</td>
                        </tr>
                        <tr>
                            <td>Assigned To</td>
                            <td>{{ $lead->user ? $lead->user->name : '' }}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $lead->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('admin.lead.index') }}">Back</a>
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
