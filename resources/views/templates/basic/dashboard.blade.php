@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row gy-4 mb-3 text-center border-bottom">
        <h1 class="display-5 fw-bold">{{ __(@$pageContent->heading) }}</h1>

        <div class="col-lg-12 mx-auto">
            <p class="lead mb-4 px-2">
                {{ __(@$pageContent->subheading) }}
            </p>
            <div class="d-sm-flex justify-content-sm-center mb-5">
                <a href="{{ route('diagnose.index') }}" class="btn btn-primary btn-lg px-4 me-sm-3">@lang('Diagnose Now')</a>
            </div>
        </div>

        <div class="col-xxl-12">
            <div class="overflow-hidden" style="max-height: 55vh;">
                <div class="px-5">
                    <img src="{{ getImage('assets/images/frontend/user_dashboard_page/' . @$pageContent->hero_image, '1366x500') }}"
                        class="img-fluid border rounded-3 shadow-sm mb-4" alt="Hero Image" width="1366" height="500"
                        loading="lazy">
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-4 mt-4 px-2">
        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalDisease']) }}" title="{{ __('Total Disease') }}" style="7"
                type="2" link="{{ route('disease.info') }}" icon="las la-biohazard" color="white" bg="red" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalSymptoms']) }}" title="{{ __('Total Symptom') }}"
                style="7" type="2" link="{{ route('sympton.info') }}" icon="las la-dna" color="white"
                bg="warning" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalRecommendation']) }}"
                title="{{ __('Total Recommendation') }}" style="7" type="2" icon="las la-heartbeat"
                color="white" bg="success" />
        </div>

        <div class="col-xxl-3 col-sm-6">
            <x-widget value="{{ shortNumber($resources['totalHospital']) }}" title="{{ __('Total Hospital') }}"
                style="7" type="2" link="{{ route('hospitals') }}" icon="las la-hospital-symbol" color="white"
                bg="15" />
        </div>
    </div>
@endsection
