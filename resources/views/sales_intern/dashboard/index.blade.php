@extends('master_layouts.app')
@section('title') Dashboard @endsection
@section('content')
@php
$users = App\Models\User::where('status','1')->get();

$projects = App\Models\Project::where('status','1')->get();
$leads = App\Models\Lead::where('status','2')->get();
$feedback = App\Models\LeadFeedback::where('status','1')->get();
@endphp

<style type="text/css">
    .row-md-body.no-nav {
    margin-top: 70px;
}
</style>

<div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
</div>

<div class="row section-mg row-md-body no-nav mt-5">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Active Users</h4>
                <p><b> {{count($users)}} </b></p>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-star fa-3x"></i>
            <div class="info">
                <h4>Projects</h4>
                <p><b> {{count($projects)}} </b></p>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
                <h4>Lead</h4>
                {{-- <p><b> {{$data->lead}} </b></p> --}}
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-comments-o fa-3x"></i>
            <div class="info">
                <h4>Feedback</h4>
                <p><b> {{count($feedback)}} </b></p>
            </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-md-12">
        <div class="card">
            <div class="panel-heading">
               Lead Details
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs w-100">
                    <li><a href="#firsttab" data-toggle="tab" class="active">New Lead</a></li>
                    <li><a href="#secondtab" data-toggle="tab">Ongoing Lead</a></li>
                    <li><a href="#thirdtab" data-toggle="tab">Completed Lead</a></li>
                    <li><a href="#fourthtab" data-toggle="tab">Cancel Lead</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="firsttab">
                        <div class="card-body">
                        <div class="tile-body table-responsive">
                            <table class="table table-hover custom-data-table-style">
                                <thead>
                                    <tr>
                                        <th> Project</th>
                                        <th>  Name</th>
                                        <th> Contact</th>
                                        <th> Assigned to</th>
                                        <th>  Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse($newleads as $leads)
                                        <tr>
                                            <td>{{ ($leads->project) ? $leads->project->title : ''}}</td>
                                            <td>{{ $leads->customer_name}}</td>
                                            <td>
                                                {{ $leads->customer_email}}

                                               {{ $leads->customer_mobile}}
                                            </td>
                                            <td>{{$leads->user? $leads->user->name : ''}}</td>
                                            <td class="align-center">
                                            <a href="{{ route('admin.lead.details', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="100%" class="text-center text-muted">No Data found</td></tr>
                                    @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <div class="tab-pane" id="secondtab">
                        <div class="card-body">
                            <div class="tile-body table-responsive">
                                <table class="table table-hover custom-data-table-style">
                                    <thead>
                                        <tr>
                                            <th> Project</th>
                                            <th>  Name</th>
                                            <th> Contact</th>
                                            <th> Assigned to</th>
                                            <th>  Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse($ongoingleads as $leads)
                                            <tr>
                                                <td>{{ ($leads->project) ? $leads->project->title : ''}}</td>
                                                <td>{{ $leads->customer_name}}</td>
                                                <td>
                                                    {{ $leads->customer_email}}

                                                   {{ $leads->customer_mobile}}
                                                </td>
                                                <td>{{$leads->user? $leads->user->name : ''}}</td>
                                                <td class="align-center">
                                                <a href="{{ route('admin.lead.details', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="100%" class="text-center text-muted">No Data found</td></tr>
                                        @endforelse --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="thirdtab">
                        <div class="card-body">
                            <div class="tile-body table-responsive">
                                <table class="table table-hover custom-data-table-style">
                                    <thead>
                                        <tr>
                                            <th> Project</th>
                                            <th>  Name</th>
                                            <th> Contact</th>
                                            <th> Assigned to</th>
                                            <th>  Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse($completeleads as $leads)
                                            <tr>
                                                <td>{{ ($leads->project) ? $leads->project->title : ''}}</td>
                                                <td>{{ $leads->customer_name}}</td>
                                                <td>
                                                    {{ $leads->customer_email}}

                                                   {{ $leads->customer_mobile}}
                                                </td>
                                                <td>{{$leads->user? $leads->user->name : ''}}</td>
                                                <td class="align-center">
                                                <a href="{{ route('admin.lead.details', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="100%" class="text-center text-muted">No Data found</td></tr>
                                        @endforelse --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane" id="fourthtab">
                        <div class="card-body">
                            <div class="tile-body table-responsive">
                                <table class="table table-hover custom-data-table-style">
                                    <thead>
                                        <tr>
                                            <th> Project</th>
                                            <th>  Name</th>
                                            <th> Contact</th>
                                            <th> Assigned to</th>
                                            <th>  Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse($cancelleads as $leads)
                                            <tr>
                                                <td>{{ ($leads->project) ? $leads->project->title : ''}}</td>
                                                <td>{{ $leads->customer_name}}</td>
                                                <td>
                                                    {{ $leads->customer_email}}

                                                   {{ $leads->customer_mobile}}
                                                </td>
                                                <td>{{$leads->user? $leads->user->name : ''}}</td>
                                                <td class="align-center">
                                                <a href="{{ route('admin.lead.details', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="100%" class="text-center text-muted">No Data found</td></tr>
                                        @endforelse --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row mt-5">
    <div class="col-md-7">
        <div class="card">
            <div class="panel-heading">
                Todays lead
            </div>
            <div class="card-body">
                <div class="tile-body table-responsive">
                    <table class="table table-hover custom-data-table-style">
                        <thead>
                            <tr>
                                <th> Project</th>
                                <th>  Name</th>
                                <th> Contact</th>
                                <th> Assigned to</th>
                                <th>  Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse($lead as $leads)
                                <tr>
                                    <td>{{ ($leads->project) ? $leads->project->title : ''}}</td>
                                    <td>{{ $leads->customer_name}}</td>
                                    <td>
                                        {{ $leads->customer_email}}

                                       {{ $leads->customer_mobile}}
                                    </td>
                                    <td>{{$leads->user? $leads->user->name : ''}}</td>
                                    <td class="align-center">
                                    <a href="{{ route('admin.lead.details', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="100%" class="text-center text-muted">No Data found</td></tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="panel-heading">
                Latest Comments
                <a href="{{ route('admin.leadfeedback.index') }}" class="">View more</a>
            </div>
            <div class="ps--active-y">
                <div class="panel-body">
                    {{-- @foreach($leaduser as $leads)
                    <div class="media">
                        <div class="m_user">@if($leads->user->image!='')
                            <img style="width: 40;height: 40;" src="{{URL::to('/').'/User/'}}{{$leads->user->image}}">
                            @endif</div>
                        <div class="m_text">
                            <h5>{{ $leads->user->name }} <span>{{ $leads->created_at }}</span></h5>
                            <p>{{ $leads->comment }}</p>
                            <p>Lead : <a href="{{ route('admin.lead.details', $leads['id']) }}">{{ $leads->lead->subject }}</a></p>
                        </div>
                    </div>
                @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
