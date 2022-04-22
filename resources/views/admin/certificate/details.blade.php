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
                            <td>Prefix Name</td>
                            <td>{{ empty($cer['name_prefix'])? null:$cer['name_prefix'] }}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{ empty($cer['first_name'])? null:$cer['first_name'] }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ empty($cer['last_name'])? null:$cer['last_name'] }}</td>
                        </tr>
                        <tr>
                            <td> Email</td>
                            <td>{{ empty($cer['email'])? null:$cer['email'] }}</td>
                        </tr>
                        <tr>
                            <td> Mobile</td>
                            <td>{{ empty($cer['phone'])? null:$cer['phone'] }}</td>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <td>{{ empty($cer['start_date'])? null:$cer['start_date'] }}</td>
                        </tr>
                        <tr>
                            <td>End Date</td>
                            <td>{{ empty($cer['end_date'])? null:$cer['end_date'] }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ empty($cer['title'])? null:$cer['title'] }}</td>
                        </tr>
                        <tr>
                            <td>Geade</td>
                            <td>{{ empty($cer['grade'])? null:$cer['grade'] }}</td>
                        </tr>



                        <tr>
                            <td>Created at</td>
                            <td>{{ $cer->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('admin.certificate.index') }}">Back</a>
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
