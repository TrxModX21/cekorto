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
                                    <th>@lang('Code')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($recommendations as $recommendation)
                                    <tr>
                                        <td>{{ $recommendation->code }}</td>

                                        <td>{{ __($recommendation->title) }}</td>

                                        <td>{{ __(truncateText($recommendation->long_desc, 10)) ?: 'N/A' }}</td>

                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <button class="btn btn-outline--primary editBtn btn-sm"
                                                    data-url="{{ route('admin.recommendation.update', $recommendation->id) }}"
                                                    data-image="{{ getImage(getFilePath('recommendations') . '/' . $recommendation->image) }}"
                                                    data-resource="{{ json_encode($recommendation->only('title', 'long_desc', 'code', 'priority')) }}">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </button>

                                                <button class="btn btn-sm btn-outline--danger confirmationBtn"
                                                    data-question="@lang('Are you sure to remove this from system?')"
                                                    data-action="{{ route('admin.recommendation.destroy', $recommendation->id) }}">
                                                    <i class="la la-trash"></i> @lang('Remove')
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

                @if ($recommendations->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($recommendations) }}
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
                    <h4 class="modal-title" id="createModalLabel"> @lang('Add New Recommendation')</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i></button>
                </div>

                <form class="form-horizontal" method="post" action="{{ route('admin.recommendation.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label> @lang('Image')</label>
                                <x-image-uploader :imagePath="getImage(null, getFileSize('recommendations'))" :size="getFileSize('recommendations')" class="w-100" id="imageCreate"
                                    :required="false" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Priority')</label>
                            <select class="form-control" name="priority" required>
                                <option value="1">@lang('High')</option>
                                <option value="2">@lang('Medium')</option>
                                <option value="3">@lang('Low')</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('Code')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="C00" name="code"
                                    value="{{ old('code') }}" minlength="3" maxlength="4" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Description')</label>

                            <textarea name="description" rows="10" class="form-control" placeholder="@lang('Description for this recommendation.')">{{ old('description') }}</textarea>
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
                    <h4 class="modal-title" id="editModalLabel"> @lang('Edit Recommendation')</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i></button>
                </div>

                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label> @lang('Image')</label>
                                <x-image-uploader :imagePath="getImage(null, getFileSize('recommendations'))" :size="getFileSize('recommendations')" class="w-100" id="imageEdit"
                                    :required="false" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Priority')</label>
                            <select class="form-control" name="priority" required>
                                <option value="1">@lang('High')</option>
                                <option value="2">@lang('Medium')</option>
                                <option value="3">@lang('Low')</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('Code')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="C00" name="code"
                                    value="{{ old('code') }}" minlength="3" maxlength="4" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Description')</label>

                            <textarea name="description" rows="10" class="form-control" placeholder="@lang('Description for this recommendation.')">{{ old('description') }}</textarea>
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
    <button class="btn btn-outline--primary h-45" data-bs-toggle="modal" data-bs-target="#createModal">
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
                var data = $(this).data('resource');

                modal.find('form').attr('action', url);
                modal.find('input[name=title]').val(data.title);
                modal.find('input[name=code]').val(data.code);
                modal.find('textarea[name=description]').val(data.long_desc);
                modal.find('input[name=priority]').val(data.priority);
                modal.find('.image-upload-preview').css('background-image', `url(${$(this).data('image')})`);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
