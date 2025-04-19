@php
    $rawContent = getContent('diagnostic_page.content', true);
    $content = $rawContent->data_values;
@endphp

@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card bl--5 border--primary">
                <div class="card-body">
                    <p class="text--primary">{{ __($content->brief_instruction_content) }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <form method="post" action="{{ route('diagnose.process') }}">
                    @csrf

                    <div class="card-body p-0">
                        <div class="sticky-top"
                            style="padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x); background-color: var(--bs-card-bg); z-index: 998;">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <h4>@lang('All Symptom List')</h4>
                                <div class="position-relative">
                                    <div class="system-search-icon"><i class="las la-search"></i></div>
                                    <input class="form-control searchInput" type="search"
                                        placeholder="@lang('Search Symptom')...">
                                </div>
                            </div>
                        </div>


                        <div class="col-12 m-0">
                            <div class="emptyArea"></div>
                        </div>

                        <ul class="list-group" style="margin: var(--bs-card-spacer-y) var(--bs-card-spacer-x);">
                            @foreach ($symptoms as $symptom)
                                <li
                                    class="searchItem list-group-item flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                    <div class="symptomContainer">
                                        <p class="fw-bold mb-0 symptomName">
                                            {{ $symptom->code . ' - ' . __($symptom->name) }}</p>
                                        <p class="mb-0">
                                            <small>{{ __($symptom->description ?: 'No explanation yet') }}</small>
                                        </p>
                                    </div>

                                    <div class="d-flex gap-4 flex-wrap flex-sm-nowrap align-items-center">
                                        <div class="button--group mt-0">
                                            <button type="button" class="btn btn-sm btn-outline--dark ms-1 mb-2 helpBtn"
                                                data-title="{{ __($symptom->name) }}"
                                                data-details="{{ __($symptom->details) }}">
                                                <i class="la la-question"></i> @lang('Detail')
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" data-width="100%" data-size="large"
                                                data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle"
                                                data-height="35" data-on="@lang('Selected')" data-off="@lang('Unselected')"
                                                name="selectedSymptoms[]" value="{{ $symptom->id }}">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- HELP MODAL --}}
    <div id="helpModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Help')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>

                <div class="modal-body">
                    @php
                        echo $content->help_content;
                    @endphp
                </div>
            </div>
        </div>
    </div>

    {{-- SYMPTOM DETAILS MODAL --}}
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

    {{-- DIAGNOSE RESULT --}}
    @include('templates.basic.partials.diagnose_result')
@endsection

@push('breadcrumb-plugins')
    <button type="button" data-bs-target="#helpModal" data-bs-toggle="modal" class="btn btn-sm btn-outline--info">
        <i class="las la-question"></i>@lang('Help')
    </button>
@endpush

@push('style')
    <style>
        .offcanvas.offcanvas-bottom {
            max-height: 70vh;
            height: max-content;
        }

        .offcanvas {
            z-index: 999999999999;
        }

        .offcanvas-backdrop.show {
            background-color: transparent;
            z-index: 999999999;
        }

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

        .helpBtn {
            height: 37px !important;
            min-height: 37px !important;
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
                let title = $(this).data('title');
                let details = $(this).data('details');
                let dataDetails = details != '' ? details : "<h1 class='text-center'>No explanation yet</h1>";

                modal.find('.modal-title').html(title);
                modal.find('.modal-body').html(dataDetails);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
