@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title pt-2">
                        @lang('At')
                        {{ showDateTime($diagnose->created_at) }},
                        {{ diffForHumans($diagnose->created_at) }}
                    </h5>
                </div>

                <div class="card-body">
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
                                            <h4 class="text--white">{{ $fullname }}</h4>
                                            <p class="text--white">@ {{ $user->username }}</p>
                                        </div>
                                    </div>

                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Medical Record Number')
                                            <span class="fw-bold">{{ $user->rm }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Firstname')
                                            <span class="fw-bold">{{ $user->firstname }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Lastname')
                                            <span class="fw-bold">{{ $user->lastname ?: 'N/A' }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Gender')
                                            <span
                                                class="fw-bold">{{ $user->gender == Status::MALE ? __('Male') : __('Female') }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Age')
                                            <span class="fw-bold">{{ $user->age ?: 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 mb-30">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-30 border-bottom pb-2">@lang('Full Diagnose Result')</h5>

                                    <div class="col-md-12 mb-30">
                                        <div class="card bl--5 border--primary">
                                            <div class="card-body">
                                                <h6 class="text--primary">TODO:: Kemungkinan penyakit yang dialami:
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="list-group">
                                        @forelse ($diseaseResult as $result)
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div class="symptomContainer">
                                                    <p class="fw-bold mb-0 symptomName">
                                                        {{ __($result['disease']['name']) }}
                                                    </p>
                                                    <p class="mb-0">
                                                        <small>@lang('Possible Percentage: ')</small>
                                                        <b>{{ $result['percentage'] }}%</b>
                                                    </p>
                                                </div>

                                                <div class="button--group mt-0 align-self-center" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="@lang('Details')">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--dark ms-1 mb-2 diseaseDetails"
                                                        style="margin-right: 10px;"
                                                        data-title="@lang('Learn more about '){{ __($result['disease']['name']) }}"
                                                        data-raw-title="{{ __($result['disease']['name']) }}"
                                                        data-details="{{ __($result['disease']['details']) }}">
                                                        <i class="la la-info" style="margin-right: 0;"></i>
                                                        {{-- @lang('Details') --}}
                                                    </button>
                                                </div>
                                            </li>
                                        @empty
                                            <div class="col-md-12 mb-30">
                                                <div class="card bl--5 border--orange">
                                                    <div class="card-body">
                                                        <h6 class="text--orange">TODO:: TEXT DATA PENYAKIT TIDAK
                                                            TERDETEKSI
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 mb-30">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">@lang('Selected Symptoms')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($diagnose->symptoms as $symptom)
                                            <li class="list-group-item d-flex justify-content-between">
                                                <div class="d-flex align-items-start">
                                                    <div class="me-3 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                        style="width: 24px; height: 24px;">{{ $loop->index + 1 }}
                                                    </div>
                                                    <span>{{ __($symptom->name) }}</span>
                                                </div>

                                                <div class="button--group mt-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="@lang('Details')">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--dark ms-1 mb-2 diseaseDetails"
                                                        style="margin: 0 10px 0 0;"
                                                        data-title="@lang('Learn more about '){{ __($symptom->name) }}"
                                                        data-raw-title="{{ __($symptom->name) }}"
                                                        data-details="{{ __($symptom->details) }}">
                                                        <i class="la la-info" style="margin-right: 0;"></i>
                                                        {{-- @lang('Details') --}}
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 mb-30">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">@lang('Recommendation')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($diagnose->results as $result)
                                            <div class="col-md-12 my-20">
                                                <div class="card bl--5 border--success">
                                                    <div class="card-body">
                                                        <p>
                                                            @lang('Some suggestions that can be made temporarily regarding ')
                                                            <b>{{ __($result['disease']['name']) }}</b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @forelse ($result['recommendations'] as $recommendation)
                                                <li
                                                    class="list-group-item d-flex justify-content-between list-group-item d-flex justify-content-between recommendationItems">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3 d-none d-md-flex bg-primary text-white rounded-circle justify-content-center align-items-center"
                                                            style="width: 24px; height: 24px;">{{ $index }}
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <p class="fw-bold">{{ __($recommendation['title']) }}</p>
                                                            <span>{{ __($recommendation['short_desc']) }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="button--group mt-0 align-self-end align-self-md-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="@lang('Details')">
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline--dark ms-1 mb-2 diseaseDetails"
                                                            style="margin: 0 10px 0 0;"
                                                            data-title="@lang('Learn more about '){{ __($recommendation['title']) }}"
                                                            data-raw-title="{{ __($recommendation['title']) }}"
                                                            data-image="{{ getImage(getFilePath('recommendations') . '/' . $recommendation['image']) }}"
                                                            data-details="{{ __($recommendation['long_desc']) }}">
                                                            <i class="la la-info" style="margin-right: 0;"></i>
                                                            
                                                        </button>
                                                    </div>
                                                </li>
                                                @php
                                                    $index++;
                                                @endphp
                                            @empty
                                                <div class="col-md-12 mb-30">
                                                    <div class="card bl--5 border--orange">
                                                        <div class="card-body">
                                                            <h6 class="text--orange">TODO:: TEXT DATA PENYAKIT TIDAK
                                                                TERDETEKSI
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('diagnose.history') }}" class="btn btn--dark my-2">@lang('Back')</a>
                </div>
            </div>
        </div>
    </div>

    {{-- OFFCANVAS INFORMATION --}}
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel"
        style="min-height: 85vh;">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small"></div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('diagnose.history') }}" />
@endpush


@push('script')
    <script>
        (function($) {
            "use strict";

            let offcanvas = $('#offcanvasBottom');
            let bsOffcanvas = new bootstrap.Offcanvas(offcanvas);

            // HANDLE DISEASE DETAILS
            $('.diseaseDetails').click(function() {
                let title = $(this).data('title');
                let rawTitle = $(this).data('raw-title');
                let details = $(this).data('details');
                let image = $(this).data('image');
                handleOffCanvas(rawTitle, title, details, image);
            });

            // HANDLE CLOSE OFFCANVAS
            $(document).on('click', '#offcanvasBottomLabel', function() {
                bsOffcanvas.hide();
            });

            function handleOffCanvas(rawTitle, title, details, image) {
                let offCanvas = $('#offcanvasBottom');

                let contents = `
                <div class="container">                    
                    <div class='col-md-12 mb-30'>
                        <div class='card bl--5 border--danger'>
                            <div class='card-body'>
                                <h4 class='text--danger text-center'>@lang('No explanation yet')</h4> 
                            </div>
                        </div>
                    </div>
                </div>`;

                if (details != '') {
                    let imageContent = '';
                    if (image) {
                        imageContent = `
                        <div class="col-lg-12">
                            <div class="overflow-hidden">
                                <img src="${image}" class="img-fluid border rounded-3 shadow-md" alt="Image" loading="lazy"/>
                            </div>    
                        </div>`;
                    }

                    contents = `
                    <div class="row text-center">
                        <h4 class="fw-bold">${rawTitle}</h4>

                        <div class="col-lg-12 mt-2 mb-4 mx-auto">
                            ${details}
                        </div>

                        ${imageContent}                        
                    </div>`;
                }

                offCanvas.find('.offcanvas-title').html(title);
                offCanvas.find('.offcanvas-body').html(contents);
                bsOffcanvas.show();
            }

        })(jQuery);
    </script>
@endpush
