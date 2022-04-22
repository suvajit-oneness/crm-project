@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
   <div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.certificate.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            {{-- <a href="#csvUploadModal" data-toggle="modal" class="btn btn-primary "><i class="fa fa-cloud-upload"></i> CSV Import</a> --}}
            {{-- <a href="#csvUploadModal" class="btn btn-primary "><i class="fa fa-cloud-download"></i> CSV Export</a> --}}
        </div>
    </div>
    </div>
    @include('admin.partials.flash')
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
                    <table class="table table-hover custom-data-table-style" id="sampleTable">
                        <thead>
                            <tr>

                                <th> Prefix_name</th>
                                <th> First Name</th>
                                <th> Last Name</th>
                                <th> Email</th>
                                <th>  Phone</th>
                                <th> Title</th>
                                <th> Grade</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cer as $leads)
                                <tr>

                                    <td>{{$leads->name_prefix}}</td>
                                    <td>{{ $leads->first_name}}</td>
                                    <td>
                                        {{ $leads->last_name}}
                                    </td>
                                    <td>
                                        {{ $leads->email}}
                                    </td>
                                    <td>{{ $leads->phone}}</td>
                                    <td>{{$leads->title}}</td>
                                    <td>{{$leads->grade}}</td>
                                    <td>
                                    <div class="toggle-button-cover margin-auto">
                                        <div class="button-cover">
                                            <div class="button-togglr b2" id="button-11">
                                                <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-id="{{ $leads['id'] }}" {{ $leads['status'] == 1 ? 'checked' : '' }}>
                                                <div class="knobs"><span>Inactive</span></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                                    </td>
                                    <td class="align-center">

                                       <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.certificate.edit', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.certificate.details', $leads['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                        <a href="#" data-id="{{$leads['id']}}" class="sa-remove btn btn-sm edit-btn del_btn"><i class="fa fa-trash"></i></a>
                                    </div>
                                    </td>
                                </tr>
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
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var id = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "certificate/"+id+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var id = $(this).data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var check_status = 0;
          if($(this).is(":checked")){
              check_status = 1;
          }else{
            check_status = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.certificate.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:id, check_status:check_status},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {

                  swal("Error!", response.message, "error");
                }
              });
        });
    </script>
@endpush
