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
                                    <th>@lang('Name')</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($symptoms as $symptom)
                                    <tr>
                                        <td>{{ $symptom->code }}</td>

                                        <td>
                                            {{ __($symptom->name) }}
                                        </td>

                                        <td>
                                            {{ __(truncateText($symptom->description) ?: 'N/A') }}
                                        </td>

                                        <td>
                                            @php echo $symptom->statusBadge; @endphp
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <a href="{{ route('admin.symptom.edit', $symptom->id) }}"
                                                    class="btn btn-outline--primary cuModalBtn editBtn btn-sm">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </a>

                                                @if ($symptom->status == Status::ENABLE)
                                                    <button class="btn btn-outline--warning btn-sm confirmationBtn"
                                                        data-question="@lang('Are you sure to disable this symptom?')"
                                                        data-action="{{ route('admin.symptom.status', $symptom->id) }}">
                                                        <i class="las la-eye-slash"></i>@lang('Disable')
                                                    </button>
                                                @else
                                                    <button class="btn btn-outline--success confirmationBtn btn-sm"
                                                        data-question="@lang('Are you sure to enable this symptom?')"
                                                        data-action="{{ route('admin.symptom.status', $symptom->id) }}">
                                                        <i class="las la-eye"></i>@lang('Enable')
                                                    </button>
                                                @endif

                                                <button class="btn btn-outline--danger btn-sm confirmationBtn"
                                                    data-question="@lang('Are you sure to remove this symptom?')"
                                                    data-action="{{ route('admin.symptom.destroy', $symptom->id) }}">
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

                @if ($symptoms->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($symptoms) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- STATUS CONFIRMATION MODAL --}}
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <x-search-form />
    <a href="{{ route('admin.symptom.create') }}" class="btn btn-outline--primary h-45">
        <i class="las la-plus"></i>@lang('Add New')
    </a>
@endpush
