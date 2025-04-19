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
                                    <th>S/N</th>
                                    <th>@lang('Symptom')</th>
                                    <th>@lang('Disease')</th>
                                    <th>@lang('Weight')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>
                                            {{ $data->symptom->code . ' - ' . $data->disease->code }}</td>

                                        <td class="text-start">{{ __($data->symptom->name) }}</td>

                                        <td>{{ __($data->disease->name) }}</td>

                                        <td>{{ $data->weight }}</td>

                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <button class="btn btn-outline--primary cuModalBtn editBtn btn-sm"
                                                    data-modal_title="@lang('Update Symptom Disease Pair')" data-resource="{{ $data }}">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </button>

                                                <button class="btn btn-sm btn-outline--danger confirmationBtn"
                                                    data-question="@lang('Are you sure to remove this pair from this system?')"
                                                    data-action="{{ route('admin.chaining.destroy', $data->id) }}">
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

                @if ($datas->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($datas) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ADD/UPDATE MODAL --}}
    <div class="modal fade" id="cuModal" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>

                <form action="{{ route('admin.chaining.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Symptom')</label>
                            <select class="form-control select2" name="symptom" required>
                                <option value="">@lang('Select symptom')</option>

                                @foreach ($symptoms as $symptom)
                                    <option value="{{ $symptom->id }}">{{ __($symptom->code . ' - ' . $symptom->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('Disease')</label>
                            <select class="form-control select2" name="disease" required>
                                <option value="">@lang('Select disease')</option>

                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease->id }}">{{ __($disease->code . ' - ' . $disease->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>@lang('Weight (weight of symptoms to disease, value 0-1)')</label>
                            <input class="form-control" type="number" step="0.1" maxlength="3" min="0.1"
                                max="1" name="weight" value="{{ old('weight') }}" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- STATUS CONFIRMATION MODAL --}}
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <button class="btn btn-outline--primary h-45 cuModalBtn" data-modal_title="@lang('Add Symptom Disease Pair')">
        <i class="las la-plus"></i>@lang('Add New')
    </button>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            $('.editBtn').on('click', function() {
                let modal = $('#cuModal');
                let data = $(this).data('resource');
                modal.find('form').attr('action',
                    ` {{ route('admin.chaining.store', '') }}/${data.id}`);

                $("select[name=symptom]").removeAttr('required');
                setTimeout(() => {
                    $('select[name="symptom"]').val(data.symptom.id).change();
                }, 800);

                $("select[name=disease]").removeAttr('required');
                setTimeout(() => {
                    $('select[name="disease"]').val(data.disease.id).change();
                }, 800);
            });
        })(jQuery);
    </script>
@endpush
