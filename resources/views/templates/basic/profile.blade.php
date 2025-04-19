@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        <div class="avatar avatar--lg">
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile')) }}"
                                alt="@lang('Image')">
                        </div>
                        <div class="ps-3">
                            <h4 class="text--white">{{ __($name) }}</h4>
                        </div>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Firstname')
                            <span class="fw-bold">{{ __($user->firstname) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Lastname')
                            <span class="fw-bold">{{ __($user->lastname) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="fw-bold">{{ __('@' . $user->username) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Email')
                            <span class="fw-bold">{{ $user->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2">@lang('Profile Information')</h5>

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <x-image-uploader image="{{ $user->image }}" class="w-100" type="userProfile"
                                        :required=false />
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label>@lang('Firstname')</label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ $user->firstname }}" required>
                                </div>

                                <div class="form-group ">
                                    <label>@lang('Lastname')</label>
                                    <input class="form-control" type="text" name="lastname" value="{{ $user->lastname }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('user.password') }}" class="btn btn-sm btn-outline--primary"><i
            class="las la-key"></i>@lang('Password Setting')</a>
@endpush
