@extends('admin.layouts.app')

@section('panel')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center">
                <div class="update-available-card-wrapper">
                    <div class="update-available-card border--danger">
                        <div class="update-available-card-bottom">
                            <p>
                                <span>
                                    <i class="las la-info-circle text--primary"></i>
                                </span>
                                <span>
                                    <strong>@lang('You will delete all disease data.')</strong>
                                    @lang('All related data will be permanently deleted and cannot be restored! ')
                                    <strong>@lang('Please ensure you:')</strong>
                                </span>
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <span><i class="las la-check-double text--success"></i> @lang('Have made backups of the necessary data')</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <span><i class="las la-check-double text--success"></i> @lang('Understand the impact of deletion on the running system')</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <span><i class="las la-check-double text--success"></i> @lang('Understand all disease data will be removed permanently.')</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-footer">
                                <button data-question="@lang('Are you sure to reset this data? This process cannot be undo!')"
                                    data-action="{{ route('admin.system.reset.disease') }}"
                                    class="btn btn--danger w-100 h-45 confirmationBtn">@lang('Click to process')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('style')
    <style>
        .update-available-card {
            background-color: #fff;
            border-radius: 5px;
            padding: 30px;
            border: 3px solid;
        }

        .update-available-card-wrapper {
            width: 730px;
        }

        .update-available-card-bottom p {
            display: flex;
            gap: 10px;
            line-height: 1.4;
            font-style: italic;
        }

        .update-available-card-bottom p i {
            font-size: 1.25rem;
            vertical-align: middle;
        }
    </style>
@endpush
