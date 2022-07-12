@extends('admin.app')
@section('title') Sales Intern @endsection
@section('content')
   <div class="fixed-row">
    <div class="app-title">
        <div>
            {{-- <h1><i class="fa fa-file-text"></i> {{ $pageTitle }}</h1> --}}
            <h1><i class="fa fa-file-text"></i> Sales Intern</h1>
            {{-- <p>{{ $subTitle }}</p> --}}
            <p>Sales Intern</p>
        </div>
        {{-- <div class="col-md-6 text-right">
            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            <a href="#csvUploadModal" data-toggle="modal" class="btn btn-primary "><i class="fa fa-cloud-upload"></i> CSV Import</a>
            <a href="#csvUploadModal" class="btn btn-primary "><i class="fa fa-cloud-download"></i> CSV Export</a>
        </div> --}}
    </div>
    </div>
    @include('master_layouts.partials.flash')
    <div class="alert alert-success" id="success-msg" style="display: none;">
        <span id="success-text"></span>
    </div>
    <div class="alert alert-danger" id="error-msg" style="display: none;">
        <span id="error-text"></span>
    </div>
    <div class="row section-mg row-md-body no-nav mt-0 mt-lg-5">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body table-responsive">
                    <table class="table table-hover custom-data-table-style text-center">
                        <thead>
                            <tr>
                                {{-- <th class="text-center"><i class="fi fi-br-picture"></i> Image</th> --}}
                                <th class="text-left"> Role</th>
                                {{-- @foreach ($modules as $module)
                                <th> {{$module->name}}</th>
                                @endforeach --}}
                                <th> Dashboard </th>
                                <th>Project management </th>
                                <th> Lead management </th>
                                <th> Lead Feedback Management </th>
                                <th> HR Intern Management	</th>
                                <th>Sales Intern Management	</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="#">
                                <tr>
                                    <td class="text-left">Sales Manager</td>
                                    {{-- @foreach ($modules as $module)
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    @endforeach --}}
                                   
                                    <td>
                                        <input type="checkbox" name="module_id" value="1" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            {{-- <form action="#">
                                <tr>
                                    <td class="text-left">HR</td>
                                   
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            <form action="#">
                                <tr>
                                    <td class="text-left">Sales Intern</td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            <form action="#">
                                <tr>
                                    <td class="text-left">HR Intern</td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-control">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </form> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
@endpush
@push('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable({"ordering": false});
    </script>
    
@endpush
