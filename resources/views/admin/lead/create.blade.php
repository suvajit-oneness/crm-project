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

                        <a class="btn btn-secondary" href="{{ route('admin.lead.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.lead.store') }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="project_id"> Project <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name="project_id">
                                <option  value="" hidden selected>Select Project...</option>
                                @foreach ($lead as $index => $item)
                                    <option value="{{$item->id}}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('project_id') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="customer_name"> Customer Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_name') is-invalid @enderror" type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"/>
                            @error('customer_name') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="customer_email"> Customer Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_email') is-invalid @enderror" type="text" name="customer_email" id="customer_email" value="{{ old('customer_email') }}"/>
                            @error('customer_email') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="customer_mobile"> Customer Mobile <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_mobile') is-invalid @enderror" type="text" name="customer_mobile" id="customer_mobile" value="{{ old('customer_mobile') }}"/>
                            @error('customer_mobile') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="customer_phone"> Customer Phone <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_phone') is-invalid @enderror" type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"/>
                            @error('customer_phone') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="customer_company"> Customer Company <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_company') is-invalid @enderror" type="text" name="customer_company" id="customer_company" value="{{ old('customer_company') }}"/>
                            @error('customer_company') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="company_website"> Customer Website <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('company_website') is-invalid @enderror" type="text" name="company_website" id="company_website" value="{{ old('company_website') }}"/>
                            @error('company_website') {{ $message ?? '' }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="customer_address"> Customer Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_address') is-invalid @enderror" type="text" name="customer_address" id="customer_address" value="{{ old('customer_address') }}"/>
                            @error('customer_address') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_city"> Customer City <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_city') is-invalid @enderror" type="text" name="customer_city" id="customer_city" value="{{ old('customer_city') }}"/>
                            @error('customer_city') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_state"> Customer State <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_state') is-invalid @enderror" type="text" name="customer_state" id="customer_state" value="{{ old('customer_state') }}"/>
                            @error('customer_state') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_country"> Customer Country <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_country') is-invalid @enderror" type="text" name="customer_country" id="customer_country" value="{{ old('customer_country') }}"/>
                            @error('customer_country') {{ $message ?? '' }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="customer_pin"> Pincode <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('customer_pin') is-invalid @enderror" type="text" name="customer_pin" id="customer_pin" value="{{ old('customer_pin') }}"/>
                            @error('customer_pin') {{ $message ?? '' }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="message"> Message <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('message') is-invalid @enderror" type="text" name="message" id="message" value="{{ old('message') }}"/>
                            @error('message') {{ $message ?? '' }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="subject"> Subject <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subject') is-invalid @enderror" type="text" name="subject" id="subject" value="{{ old('subject') }}"/>
                            @error('subject') {{ $message ?? '' }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="assigned_to"> Assign To <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name="assigned_to">
                                <option  value="" hidden selected>Select User...</option>
                                @foreach ($leaduser as $index => $item)
                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('assigned_to') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Lead</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.lead.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
