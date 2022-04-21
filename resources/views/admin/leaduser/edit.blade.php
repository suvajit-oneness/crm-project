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
                <form action="{{ route('admin.user.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name"> Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetdirectory->name) }}"/>
                            <input type="hidden" name="name" value="{{ $targetdirectory->name }}">
                            @error('name') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="email"> Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email', $targetdirectory->email) }}"/>
                            <input type="hidden" name="email" value="{{ $targetdirectory->email }}">
                            @error('email') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="mobile"> Mobile <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('mobile') is-invalid @enderror" type="text" name="mobile" id="mobile" value="{{ old('mobile', $targetdirectory->mobile) }}"/>
                            <input type="hidden" name="mobile" value="{{ $targetdirectory->mobile }}">
                            @error('mobile') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="dob"> Date of Birth <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('dob') is-invalid @enderror" type="text" name="dob" id="dob" value="{{ old('dob', $targetdirectory->dob) }}"/>
                            <input type="hidden" name="dob" value="{{ $targetdirectory->dob }}">
                            @error('dob') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="address"> Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $targetdirectory->address) }}"/>
                            <input type="hidden" name="address" value="{{ $targetdirectory->address }}">
                            @error('address') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="city"> City <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" value="{{ old('city', $targetdirectory->city) }}"/>
                            <input type="hidden" name="city" value="{{ $targetdirectory->city }}">
                            @error('city') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="state"> State <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('state') is-invalid @enderror" type="text" name="state" id="state" value="{{ old('state', $targetdirectory->state) }}"/>
                            <input type="hidden" name="state" value="{{ $targetdirectory->state }}">
                            @error('state') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="country"> Country <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('country') is-invalid @enderror" type="text" name="country" id="country" value="{{ old('country', $targetdirectory->country) }}"/>
                            <input type="hidden" name="country" value="{{ $targetdirectory->country }}">
                            @error('country') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="pin"> Pincode <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('pin') is-invalid @enderror" type="text" name="pin" id="pin" value="{{ old('pin', $targetdirectory->pin) }}"/>
                            <input type="hidden" name="pin" value="{{ $targetdirectory->pin }}">
                            @error('pin') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetdirectory->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('User/'.$targetdirectory->image) }}" id="blogImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Blog Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update User</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.user.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
