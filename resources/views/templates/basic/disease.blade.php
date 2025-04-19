@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3 justify-content-between align-items-center flex-wrap gap-2">
                        <h4>@lang('All Disease List')</h4>
                        <div class="position-relative">
                            <div class="system-search-icon"><i class="las la-search"></i></div>
                            <input class="form-control searchInput" type="search" placeholder="@lang('Search Disease')...">
                        </div>
                    </div>

                    <div class="col-12 m-0">
                        <div class="emptyArea"></div>
                    </div>

                    <ul class="list-group">
                        @foreach ($diseases as $disease)
                            <li
                                class="searchItem list-group-item flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div class="symptomContainer">
                                    <p class="fw-bold mb-0 symptomName">{{ __($disease->name) }}</p>
                                    <p class="mb-0">
                                        <small>{{ __($disease->description ?: 'No explanation yet') }}</small>
                                    </p>
                                </div>

                                <div class="d-flex gap-5 flex-wrap flex-sm-nowrap align-items-center pr-10">
                                    <div class="button--group mt-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="@lang('Details')">
                                        <button type="button" class="btn btn-sm btn-outline--dark ms-1 mb-2 helpBtn"
                                            data-title="{{ __($disease->name) }}"
                                            data-details="{{ __($disease->details) }}">
                                            <i class="la la-question" style="margin-right: 0;"></i>
                                        </button>
                                    </div>

                                    <div class="button--group mt-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="@lang('Symptoms')">
                                        <button type="button" class="btn btn-sm btn-outline--red ms-1 mb-2 symptomsBtn"
                                            data-title="@lang('Symptoms of '){{ __($disease->name) }}"
                                            data-symptoms="{{ $disease->symptoms }}">
                                            <i class="la la-bug" style="margin-right: 0;"></i>
                                        </button>
                                    </div>
                                    <div class="button--group mt-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="@lang('Recommendation')">
                                        <button type="button" class="btn btn-sm btn-outline--green ms-1 mb-2 treatmentBtn"
                                            data-title="@lang('Some suggestions for dealing with '){{ __($disease->name) }}@lang(' disease')"
                                            data-base-image-url={{ getFilePath('recommendations') . '/' }}
                                            data-recommendations="{{ $disease->recommendations }}">
                                            <i class="la la-ambulance" style="margin-right: 0;"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- INFORMATION MODAL --}}
    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .list-group-item {
            display: flex;
        }

        .frontend-section-card:hover {
            background: #e7e7e7;
        }

        .system-search-icon {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            aspect-ratio: 1;
            padding: 5px;
            display: grid;
            place-items: center;
            color: #888;
        }

        .searchInput {
            border: 1px solid #ededed;
        }

        .system-search-icon~.form-control {
            padding-left: 45px;
        }

        .toggle.btn-lg {
            height: 37px !important;
            min-height: 37px !important;
        }

        .toggle-handle {
            width: 25px !important;
            padding: 0;
        }

        .form-group {
            width: 135px;
            margin-bottom: 0;
            flex-shrink: 0;
        }

        .list-group-item:hover {
            background-color: #F7F7F7
        }
    </style>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            // HANDLE SEARCH SYMPTOM
            var searchInput = $('.searchInput');
            var searchItem = $('.searchItem');
            var emptyArea = $('.emptyArea');
            var emptyHtml = `<div class="searchItem text-center mt-4"><div class="empty-notification-list text-center">
                            <img src="{{ getImage('assets/images/empty_list.png') }}" alt="empty">
                            <h5 class="text-muted">@lang('No sympton found.')</h5>
                        </div></div>`;
            searchInput.on('input', function() {
                var searchInput = $(this).val().toLowerCase();
                var empty = true;

                searchItem.filter(function(idx, elem) {
                    if ($(elem).find('.symptomContainer .symptomName').text().trim().toLowerCase()
                        .indexOf(
                            searchInput) >= 0) {
                        $(elem).show();
                        emptyArea.empty();
                        empty = false;
                    } else {
                        $(elem).hide();
                    }
                }).sort();

                if (empty) {
                    emptyArea.html(emptyHtml);
                }
            });

            // OPEN DOCUMENTATION MODAL
            $(document).on('click', '.helpBtn', function() {
                var modal = $('#detailsModal');
                modal.find('.modal-body').html("");

                let title = $(this).data('title');
                let details = $(this).data('details');
                let dataDetails = details != '' ? details : "<h1 class='text-center'>@lang('No explanation yet')</h1>";

                modal.find('.modal-title').html(title);
                modal.find('.modal-body').html(dataDetails);
                modal.modal('show');
            });

            // OPEN SYMPTOMS INFO MODAL
            $(document).on('click', '.symptomsBtn', function() {
                var modal = $('#detailsModal');
                var body = $('.modal-body');
                body.html("");

                let title = $(this).data('title');
                let symptoms = $(this).data('symptoms');

                let htmlList = '<ul class="list-group">';
                for (let i = 0; i < symptoms.length; i++) {
                    let name = __(symptoms[i].name);
                    let description = symptoms[i].description ? __(symptoms[i].description) :
                        "@lang('No explanation yet')";

                    htmlList +=
                        `<li class="searchItem list-group-item flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div class="symptomContainer">
                                <p class="fw-bold mb-0 symptomName">${name}</p>
                                <p class="mb-0"><small>${description}</small></p>
                            </div>
                        </li>`;
                }
                htmlList += '</ul>';

                modal.find('.modal-title').html(title);
                body.html(htmlList);
                modal.modal('show');
            });

            // OPEN TREATMENT INFO MODAL
            $(document).on('click', '.treatmentBtn', function() {
                var modal = $('#detailsModal');
                var body = $('.modal-body');
                body.html("");

                let title = $(this).data('title');
                let recommendations = $(this).data('recommendations');
                let baseImageUrl = $(this).data('base-image-url');

                let htmlList = '<ul class="list-group">';
                for (let i = 0; i < recommendations.length; i++) {
                    let imageFile = '';
                    if (recommendations[i].image != null) {
                        imageFile = baseImageUrl + recommendations[i].image;
                    }
                    let name = __(recommendations[i].title);
                    let description = recommendations[i].long_desc ? __(recommendations[i].long_desc) :
                        "@lang('No explanation yet')";

                    let imageContent = '';
                    if (imageFile != '') {
                        imageContent =
                            `<div class="col-lg-12 mx-auto text-center my-4">
                                <div class="overflow-hidden">
                                     <img src="${imageFile}" class="img-fluid border rounded-3 shadow-md" alt="Image" height="200" width="200" loading="lazy"/>
                                </div>    
                            </div>`;
                    }

                    htmlList +=
                        `<li class="list-group-item flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                            <div class="symptomContainer">
                                <p class="fw-bold mb-0 symptomName">${name}</p>
                                <p class="mb-0"><small>${description}</small></p>
                                ${imageContent}
                            </div>
                        </li>`;
                }
                htmlList += '</ul>';

                modal.find('.modal-title').html(title);
                body.html(htmlList);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
