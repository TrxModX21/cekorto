@extends('admin.layouts.app')

@section('panel')
    <div class="row gy-4">
        <div class="col-xxl-4 col-sm-6">
            <x-widget style="6" link="{{ route('admin.users.all') }}" icon="las la-users" title="{{ __('Total Users') }}"
                value="{{ $widget['total_users'] }}" bg="primary" />
        </div>

        <div class="col-xxl-4 col-sm-6">
            <x-widget style="6" link="{{ route('admin.users.active') }}" icon="las la-user-check"
                title="{{ __('Active Users') }}" value="{{ $widget['verified_users'] }}" bg="success" />
        </div>

        <div class="col-xxl-4 col-sm-6">
            <x-widget style="6" link="{{ route('admin.users.banned') }}" icon="las la-user-slash"
                title="{{ __('Banned Users') }}" value="{{ $widget['banned_users'] }}" bg="danger" />
        </div>
    </div>

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalDisease']) }}" title="{{ __('Total Disease') }}"
                style="7" type="2" link="{{ route('admin.disease.all') }}" icon="las la-biohazard"
                color="white" bg="red" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalSymptoms']) }}" title="{{ __('Total Symptom') }}"
                style="7" type="2" link="{{ route('admin.symptom.all') }}" icon="las la-dna" color="white"
                bg="warning" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalRecommendation']) }}"
                title="{{ __('Total Recommendation') }}" style="7" type="2"
                link="{{ route('admin.recommendation.all') }}" icon="las la-heartbeat" color="white" bg="success" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalHospital']) }}" title="{{ __('Total Hospital') }}"
                style="7" type="2" link="{{ route('admin.hospitals.index') }}" icon="las la-hospital-symbol"
                color="white" bg="15" />
        </div>
    </div>

    <div class="row mb-none-30 mt-5">
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Browser') (@lang('Last 30 days'))</h5>

                    <canvas id="userBrowserChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By OS') (@lang('Last 30 days'))</h5>

                    <canvas id="userOsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Country') (@lang('Last 30 days'))</h5>

                    <canvas id="userCountryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        'use strict';

        piChart(
            document.getElementById('userBrowserChart'),
            @json(@$chart['user_browser_counter']->keys()),
            @json(@$chart['user_browser_counter']->flatten())
        );

        piChart(
            document.getElementById('userOsChart'),
            @json(@$chart['user_os_counter']->keys()),
            @json(@$chart['user_os_counter']->flatten())
        );

        piChart(
            document.getElementById('userCountryChart'),
            @json(@$chart['user_country_counter']->keys()),
            @json(@$chart['user_country_counter']->flatten())
        );
    </script>
@endpush