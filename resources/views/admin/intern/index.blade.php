@extends('admin.app')
@section('title') permission @endsection
@section('content')
   <div class="fixed-row">
    <div class="app-title">
        <div>
            {{-- <h1><i class="fa fa-file-text"></i> {{ $pageTitle }}</h1> --}}
            <h1><i class="fa fa-file-text"></i> Permission</h1>
            {{-- <p>{{ $subTitle }}</p> --}}
            <p>Permission</p>
        </div>
        {{-- <div class="col-md-6 text-right">
            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            <a href="#csvUploadModal" data-toggle="modal" class="btn btn-primary "><i class="fa fa-cloud-upload"></i> CSV Import</a>
            <a href="#csvUploadModal" class="btn btn-primary "><i class="fa fa-cloud-download"></i> CSV Export</a>
        </div> --}}
        
    </div>
    </div>
    @include('admin.partials.flash')
    @if (session('success'))
        <div class="alert alert-success" id="success-msg">
            <span id="success-text">{{session('success')}}</span>
        </div>
    @endif
    @if (session('unsuccess'))
        <div class="alert alert-danger" id="error-msg">
            <span id="error-text">{{session('unsuccess')}}</span>
        </div>
    @endif
    <div class="row section-mg row-md-body no-nav mt-0 mt-lg-5">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body table-responsive">
                    <table class="table table-hover custom-data-table-style text-center">
                        <thead>
                            <tr>
                                {{-- <th class="text-center"><i class="fi fi-br-picture"></i> Image</th> --}}
                                <th class="text-left"> User</th>
                                @foreach ($modules as $module)
                                <th> {{$module->name}}</th>
                                @endforeach
                                {{-- <th> Dashboard </th>
                                <th>Project management </th>
                                <th> Lead management </th>
                                <th> Lead Feedback Management </th>
                                <th> HR Intern Management	</th>
                                <th>Sales Intern Management	</th> --}}
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <form action="{{route('permission.store')}}" method="POST">
                                @csrf
                                <tr>
                                    <td class="text-left">
                                        {{$user->name}}
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                    </td>
                                    @php
                                    if (count(App\Models\Permission::where('user_id', $user->id)->get())>0) {
                                        // $modules = explode(',',App\Models\Permission::where('user_id', $user->id)->get()[0]->module_id);
                                        // print_r(App\Models\Permission::where('user_id', $user->id)->get()[0]->module_id);
                                        $module_id = explode(',',App\Models\Permission::where('user_id', $user->id)->get()[0]->module_id);
                                        $id = App\Models\Permission::where('user_id', $user->id)->get()[0]->user_id;
                                    }   
                                    @endphp
                                   @foreach ($modules as $item)
                                        <td>
                                            <input type="checkbox" name="module_id[]" {{$id == $user->id ? (in_array($item->id,$module_id) ? 'checked' : '') : '' }} value="{{$item->id}}" class="form-control">
                                        </td>
                                    @endforeach
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
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
