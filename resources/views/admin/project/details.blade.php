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
                            <td>Project Title</td>
                            <td>{{ empty($project->title)? null:$project['title'] }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ empty($project['price'])? null:$project['price'] }}</td>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <td>{{ empty($project['start_date'])? null:$project['start_date'] }}</td>
                        </tr>
                        <tr>
                            <td>End Date</td>
                            <td>{{ empty($project['end_date'])? null:$project['end_date'] }}</td>
                        </tr>
                        <tr>
                            <td>DeadLine</td>
                            <td>{{ empty($project['deadline'])? null:$project['deadline'] }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ empty($project['description'])? null:$project['description'] }}</td>
                        </tr>
                        <tr>
                            <td>Progress</td>
                            <td>{{ empty($project['progress'])? null:$project['progress'] }}</td>
                        </tr>
                        <tr>
                            <td>Files</td>
                            <td>@if($project->files!='')
                                <img style="width: 150px;height: 100px;" src="{{URL::to('/').'/File/'}}{{$project->files}}">
                                @endif</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('admin.project.index') }}">Back</a>
            </div>
        </div>
    </div>


@endsection
