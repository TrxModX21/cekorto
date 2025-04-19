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
                                @forelse ($diseases as $disease)
                                    <tr>
                                        <td>{{ $disease->code }}</td>

                                        <td>{{ __($disease->name) }}</td>

                                        <td>
                                            {{-- {{ __(truncateText($disease->description, 8) ?: 'N/A') }} --}}
                                            {{ $disease->description }}
                                        </td>

                                        <td>
                                            @php echo $disease->statusBadge; @endphp
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-1">
                                                <a href="{{ route('admin.disease.edit', $disease->id) }}"
                                                    class="btn btn-outline--primary cuModalBtn editBtn btn-sm">
                                                    <i class="las la-pen"></i>@lang('Edit')
                                                </a>

                                                @if ($disease->status == Status::ENABLE)
                                                    <button class="btn btn-outline--warning btn-sm confirmationBtn"
                                                        data-question="@lang('Are you sure to disable this disease?')"
                                                        data-action="{{ route('admin.disease.status', $disease->id) }}">
                                                        <i class="las la-eye-slash"></i>@lang('Disable')
                                                    </button>
                                                @else
                                                    <button class="btn btn-outline--success confirmationBtn btn-sm"
                                                        data-question="@lang('Are you sure to enable this disease?')"
                                                        data-action="{{ route('admin.disease.status', $disease->id) }}">
                                                        <i class="las la-eye"></i>@lang('Enable')
                                                    </button>
                                                @endif

                                                <button class="btn btn-outline--danger btn-sm confirmationBtn"
                                                    data-question="@lang('Are you sure to remove this disease?')"
                                                    data-action="{{ route('admin.disease.destroy', $disease->id) }}">
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

                @if ($diseases->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($diseases) }}
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
    <a href="{{ route('admin.disease.create') }}" class="btn btn-outline--primary h-45">
        <i class="las la-plus"></i>@lang('Add New')
    </a>
@endpush
