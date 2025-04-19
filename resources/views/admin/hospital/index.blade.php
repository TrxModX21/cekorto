@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th>@lang('#')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Latitude')</th>
                                    <th>@lang('Longitude')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($hospitals as $hospital)
                                    <tr>
                                        <td>{{ __($loop->index + 1) }}</td>

                                        <td>{{ __($hospital->name) }}</td>

                                        <td>{{ $hospital->latitude }}</td>

                                        <td>{{ $hospital->longitude }}</td>

                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <button class="btn btn-outline--primary editBtn btn-sm"
                                                    data-url="{{ route('admin.hospitals.update', $hospital->id) }}"
                                                    data-hospital="{{ json_encode($hospital->only('name', 'latitude', 'longitude')) }}"
                                                    data-image="{{ getImage(getFilePath('hospitals') . '/' . $hospital->images) }}">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </button>

                                                <button class="btn btn-outline--danger btn-sm confirmationBtn"
                                                    data-question="@lang('Are you sure to remove this hospitals?')"
                                                    data-action="{{ route('admin.hospitals.destroy', $hospital->id) }}">
                                                    <i class="las la-trash"></i>@lang('Delete')
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($hospitals->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($hospitals) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ADD MODAL --}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createModalLabel"> @lang('Add New Hospital')</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i></button>
                </div>

                <form class="form-horizontal" method="post" action="{{ route('admin.hospitals.create') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label> @lang('Hospital Image')</label>
                                <x-image-uploader :imagePath="getImage(null, getFileSize('hospitals'))" :size="getFileSize('hospitals')" class="w-100" id="imageCreate"
                                    :required="false" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <label>@lang('Hospitals Name')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                    required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label>@lang('Latitude')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('latitude') }}" name="latitude"
                                    placeholder="0.2838237" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label>@lang('Longitude')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('longitude') }}" name="longitude"
                                    placeholder="0.2838237" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45" id="btn-save"
                            value="add">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">@lang('Edit Hospital')</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i></button>
                </div>

                <form method="post" class="disableSubmission" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label> @lang('Hospital Image')</label>
                                <x-image-uploader :imagePath="getImage(null, getFileSize('hospitals'))" :size="getFileSize('hospitals')" class="w-100" id="imageEdit"
                                    :required="false" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <label>@lang('Hospitals Name')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                    required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label>@lang('Latitude')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('latitude') }}"
                                    name="latitude" placeholder="0.2838237" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label>@lang('Longitude')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('longitude') }}"
                                    name="longitude" placeholder="0.2838237" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45" id="btn-save"
                            value="add">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection


@push('breadcrumb-plugins')
    <x-search-form />
    <button class="btn btn-outline--primary h-45 cuModalBtn" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="las la-plus"></i>@lang('Add New')
    </button>
@endpush

@push('script')
    <script>
        (function($) {
            'use strict';

            $('.editBtn').on('click', function() {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var data = $(this).data('hospital');

                modal.find('form').attr('action', url);
                modal.find('input[name=name]').val(data.name);
                modal.find('input[name=latitude]').val(data.latitude);
                modal.find('input[name=longitude]').val(data.longitude);
                modal.find('.image-upload-preview').css('background-image', `url(${$(this).data('image')})`);
                
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
