@extends('templates.basic.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 m-0">
                        <div class="emptyArea"></div>
                    </div>

                    <ul class="list-group">
                        @forelse ($diagnoses as $diagnose)
                            @php
                                $user = $diagnose->user;
                            @endphp
                            <li
                                class="searchItem list-group-item flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                <div class="symptomContainer">
                                    <div class="d-flex gap-2">
                                        <p class="fw-bold mb-0 symptomName">{{ strtoupper($diagnose->d_id) }} | </p>
                                    </div>
                                    <p class="mb-0">
                                        <small class="italic">at: {{ showDateTime($diagnose->created_at) }}, </small>
                                        <small class="fw-bold">{{ diffForHumans($diagnose->created_at) }} </small>
                                    </p>
                                </div>

                                <div class="d-flex gap-4 flex-wrap flex-sm-nowrap align-items-center pr-10">
                                    <div class="button--group mt-0">
                                        <a href="{{ route('diagnose.history.detail', $diagnose->id) }}" type="button"
                                            class="btn btn-sm btn-outline--dark ms-1 mb-2">
                                            <i class="la la-question"></i> @lang('Detail')
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="text-muted fw-bold text-3xl p-4 text-center" colspan="100%">{{ __($emptyMessage) }}
                            </li>
                        @endforelse
                    </ul>
                </div>

                @if ($diagnoses->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($diagnoses) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .list-group-item {
            display: flex;
        }
    </style>
@endpush
