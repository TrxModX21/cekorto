@extends('admin.layouts.master')
@section('content')
    <div class="login-main" style="background-image: url('{{ asset('assets/admin/images/login.jpg') }}')">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                    <div class="login-area">
                        <div class="login-wrapper">
                            <div class="login-wrapper__top">
                                <h3 class="title text-white">@lang('Recover Account')</h3>
                            </div>

                            <div class="login-wrapper__body">
                                <form action="{{ route('admin.password.change') }}" method="POST" class="login-form">
                                    @csrf

                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group">
                                        <label>@lang('New Password')</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('Re-type New Password')</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" required>
                                    </div>

                                    <button type="submit" class="btn cmn-btn w-100">@lang('Submit')</button>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('admin.login') }}" class="text-white"><i
                                                class="las la-sign-in-alt" aria-hidden="true"></i>@lang('Back to Login')</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
