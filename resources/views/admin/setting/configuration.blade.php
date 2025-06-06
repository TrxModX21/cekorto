@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-body">
                        <ul class="list-group">

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('User Registration')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you disable this module, no one can register on this system.')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="registration"
                                        @if (gs('registration')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Force SSL')</p>
                                    <p class="mb-0">
                                        <small>@lang('By enabling') <span class="fw-bold">@lang('Force SSL (Secure Sockets Layer)')</span>
                                            @lang('the system will force a visitor that he/she must have to visit in secure mode. Otherwise, the site will be loaded in secure mode.')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="force_ssl"
                                        @if (gs('force_ssl')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Agree Policy')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('If you enable this module, that means a user must have to agree with your system\'s')
                                            <a href="#">
                                                @lang('policies')
                                            </a>
                                            @lang('during registration.')
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="agree"
                                        @if (gs('agree')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Force Secure Password')</p>
                                    <p class="mb-0">
                                        <small>@lang('By enabling this module, a user must set a secure password while signing up or changing the password.')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="secure_pass"
                                        @if (gs('secure_pass')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('KYC Verification')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('If you enable')
                                            <span class="fw-bold">
                                                @lang('KYC (Know Your Client)')
                                            </span>
                                            @lang('module, users must have to submit')
                                            <a href="#">
                                                @lang('the required data')
                                            </a>.
                                            @lang('Otherwise, any money out transaction will be prevented by this system.')
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="kyc_ver"
                                        @if (gs('kyc_ver')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Email Verification')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('If you enable') <span class="fw-bold">@lang('Email Verification')</span>,
                                            @lang('users have to verify their email to access the dashboard. A 6-digit verification code will be sent to their email to be verified.')
                                            <br>
                                            <span class="fw-bold"><i>@lang('Note'):</i></span> <i>@lang('Make sure that the')
                                                <span class="fw-bold">@lang('Email Notification') </span> @lang('module is enabled')</i>
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="email_ver"
                                        @if (gs('email_ver')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Email Notification')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable this module, the system will send emails to users where needed. Otherwise, no email will be sent.') <code>@lang('So be sure before disabling this module that, the system doesn\'t need to send any emails.')</code></small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="email_notif"
                                        @if (gs('email_notif')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Mobile Verification')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('If you enable') <span class="fw-bold">@lang('Mobile Verification')</span>,
                                            @lang('users have to verify their mobile to access the dashboard. A 6-digit verification code will be sent to their mobile to be verified.')
                                            <br>
                                            <span class="fw-bold"><i>@lang('Note'):</i></span> <i>@lang('Make sure that the')
                                                <span class="fw-bold">@lang('SMS Notification') </span> @lang('module is enabled')</i>
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="sms_ver"
                                        @if (gs('sms_ver')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('SMS Notification')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable this module, the system will send SMS to users where needed. Otherwise, no SMS will be sent.') <code>@lang('So be sure before disabling this module that, the system doesn\'t need to send any SMS.')</code></small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="sms_notif"
                                        @if (gs('sms_notif')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Push Notification')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('If you enable this module, the system will send push notifications to users. Otherwise, no push notification will be sent.')
                                            <a href="#">
                                                @lang('Setting here')
                                            </a>
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="push_notif"
                                        @if (gs('push_notif')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Language Option')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable this module, users can change the language according to their needs.')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" name="multi_lang"
                                        @if (gs('multi_lang')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Referral System')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable referral system, users can refer anyone and get percentage amount in each plan purchased per configuration.')@if (gs('ref_system'))
                                                <a href="{{ route('admin.setting.general') }}">
                                                    @lang('Configure referral system')
                                                </a>
                                            @endif
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="ref_system" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" type="checkbox"
                                        @if (gs('ref_system')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Image Auto Approval')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable image auto approval system, users uploaded image will approved automatically')
                                            @if (!gs('auto_approval'))
                                                <a href="#">
                                                    @lang('See Pending Images')
                                                </a>
                                            @endif
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="auto_approval" data-width="100%" data-size="large"
                                        data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle"
                                        data-height="35" data-on="@lang('Enable')" data-off="@lang('Disable')"
                                        type="checkbox" @if (gs('auto_approval')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('In App Payment')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable in app payment module, user\'s can using any payment service in web')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="in_app_payment" data-width="100%" data-size="large"
                                        data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle"
                                        data-height="35" data-on="@lang('Enable')" data-off="@lang('Disable')"
                                        type="checkbox" @if (gs('in_app_payment')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Invoice Option')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you enable invoice module, user\'s get invoice while downloading premium image by balance')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="is_invoice_active" data-width="100%" data-size="large"
                                        data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle"
                                        data-height="35" data-on="@lang('Enable')" data-off="@lang('Disable')"
                                        type="checkbox" @if (gs('is_invoice_active')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Watermark')</p>
                                    <p class="mb-0">
                                        <small>@lang('If you disable this module, do not show watermark product background images')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="watermark" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" type="checkbox"
                                        @if (gs('watermark')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Advertisement')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('If you enable the advertisement system, the website will display the advertisements you have set up from the ')
                                            <a href="#">
                                                @lang('Ads menu.')
                                            </a>
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="ads_module" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-height="35"
                                        data-on="@lang('Enable')" data-off="@lang('Disable')" type="checkbox"
                                        @if (gs('ads_module')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Contact System')</p>
                                    <p class="mb-0">
                                        <small>@lang('Users can contact you if you enable the contact system. ')</small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="contact_system" data-width="100%" data-size="large"
                                        data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle"
                                        data-height="35" data-on="@lang('Enable')" data-off="@lang('Disable')"
                                        type="checkbox" @if (gs('contact_system')) checked @endif>
                                </div>
                            </li>

                            <li
                                class="list-group-item d-flex flex-sm-nowrap justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <p class="fw-bold mb-0">@lang('Donation Module')</p>
                                    <p class="mb-0">
                                        <small>
                                            @lang('Donation module will be activated if you enable the Donation Module. You must configure')
                                            <a href="#">
                                                @lang('donation configuration')
                                            </a>
                                            @lang('to recieve donations.')
                                        </small>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="donation_module" data-width="100%" data-size="large"
                                        data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle"
                                        data-height="35" data-on="@lang('Enable')" data-off="@lang('Disable')"
                                        type="checkbox" @if (gs('donation_module')) checked @endif>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .toggle.btn-lg {
            height: 37px !important;
            min-height: 37px !important;
        }

        .toggle-handle {
            width: 25px !important;
            padding: 0;
        }

        .form-group {
            width: 125px;
            margin-bottom: 0;
            flex-shrink: 0
        }

        .list-group-item:hover {
            background-color: #F7F7F7
        }
    </style>
@endpush
