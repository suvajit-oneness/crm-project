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
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.lead.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf


                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="project_id"> Project <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="project_id">
                                    <option hidden selected>Select Project...</option>
                                    @foreach ($lead as $index => $item)
                                    <option value="{{$item->id}}" {{ ($item->id == $targetlead->project_id) ? 'selected' : '' }}>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_name">Customer Name </label>
                            <input class="form-control @error('customer_name') is-invalid @enderror" type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $targetlead->customer_name) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('content') {{ $message }} @enderror

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="customer_email">Customer Email </label>
                            <input class="form-control @error('customer_email') is-invalid @enderror" type="text" name="customer_email" id="customer_email" value="{{ old('customer_email', $targetlead->customer_email) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_email') {{ $message }} @enderror

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="customer_mobile">Customer Mobile</label>
                            <input class="form-control @error('customer_mobile') is-invalid @enderror" type="text" name="customer_mobile" id="customer_mobile" value="{{ old('customer_mobile', $targetlead->customer_mobile) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_mobile') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="customer_phone">Customer Phone</label>
                            <input class="form-control @error('customer_phone') is-invalid @enderror" type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', $targetlead->customer_phone) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_phone') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_company">Customer Company </label>
                            <input class="form-control @error('customer_company') is-invalid @enderror" type="text" name="customer_company" id="customer_company" value="{{ old('customer_company', $targetlead->customer_company) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_company') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="company_website">Customer Website </label>
                            <input class="form-control @error('company_website') is-invalid @enderror" type="text" name="company_website" id="company_website" value="{{ old('company_website', $targetlead->company_website) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('company_website') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="customer_address">Customer Address</label>
                            <input class="form-control @error('customer_address') is-invalid @enderror" type="text" name="customer_address" id="customer_address" value="{{ old('customer_address', $targetlead->customer_address) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_address') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="customer_city">Customer City</label>
                            <input class="form-control @error('customer_city') is-invalid @enderror" type="text" name="customer_city" id="customer_city" value="{{ old('customer_city', $targetlead->customer_city) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_city') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_state">Customer State</label>
                            <input class="form-control @error('customer_state') is-invalid @enderror" type="text" name="customer_state" id="customer_state" value="{{ old('customer_state', $targetlead->customer_state) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_state') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_country">Customer Country </label>
                            <input class="form-control @error('customer_country') is-invalid @enderror" type="text" name="customer_country" id="customer_country" value="{{ old('customer_country', $targetlead->customer_country) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_country') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="customer_pin">Customer Pincode</label>
                            <input class="form-control @error('customer_pin') is-invalid @enderror" type="text" name="customer_pin" id="customer_pin" value="{{ old('customer_pin', $targetlead->customer_pin) }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('customer_pin') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="message">Message</label>
                            <textarea class="form-control" rows="4" name="message" id="message">{{ old('message', $targetlead->message) }}</textarea>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('message') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="subject">Subject</label>
                            <input class="form-control @error('subject') is-invalid @enderror" type="text" name="subject" id="subject" value="{{  old('subject', $targetlead->subject)  }}"/>
                            <input type="hidden" name="id" value="{{ $targetlead->id }}">
                            @error('subject') {{ $message }} @enderror
                        </div>

                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="assigned_to"> Assigned To <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="assigned_to">
                                    <option hidden selected>Select User...</option>
                                    @foreach ($leadcat as $index => $item)
                                    <option value="{{$item->id}}" {{ ($item->id == $targetlead->assigned_to) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('assigned_to') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                        </div>

                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="status"> Status <span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="status">
                                    <option hidden selected></option>

                                    <option value="{{ $targetlead->status }}"></option>
                                    <option value="1">New</option>
                                    <option value="2">Ongoing</option>
                                    <option value="3">Completed</option>
                                    <option value="4">Cancelled</option>
                                    {{-- <option value="{{$item->id}}" {{ ($item->id == $targetlead->status) ? 'selected' : '' }}>{{ $item->status }}</option> --}}

                                </select>
                                @error('status') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Lead</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.lead.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
