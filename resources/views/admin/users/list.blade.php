@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('RM')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Gender')</th>
                                    <th>@lang('Last Diagnose')</th>
                                    {{-- <th>@lang('Joined At')</th> --}}
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                    @php
                                        $fullname = $user->firstname . ' ' . $user->lastname;
                                    @endphp
                                    <tr>
                                        <td>
                                            <b>
                                                {{ $user->rm }}
                                            </b>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $fullname }}</span>
                                            <br>
                                            <span class="small">
                                                <a
                                                    href="{{ route('admin.users.detail', $user->id) }}"><span>@</span>{{ $user->username }}</a>
                                            </span>
                                        </td>


                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        <td>
                                            {{ $user->gender == Status::MALE ? __('Male') : __('Female') }}
                                        </td>

                                        @php
                                            $diagnose = \App\Models\Diagnose::where('user_id', $user->id)
                                                ->latest('created_at')
                                                ->first();
                                            $data = @$diagnose->results;
                                            $lastCheck = '';

                                            if ($data) {
                                                foreach ($data as $key => $value) {
                                                    if ($key != 0) {
                                                        $lastCheck .= '<br/>';
                                                    }
                                                    // $lastCheck .=
                                                    //     $value['disease']['code'] .
                                                    //     ' - ' .
                                                    //     $value['disease']['name'] .
                                                    //     ' (' .
                                                    //     $value['percentage'] .
                                                    //     '%)';
                                                    $lastCheck .= "<span>{$value['disease']['code']} - {$value['disease']['name']} ({$value['percentage']})</span>";
                                                }
                                            }
                                        @endphp
                                        {{-- @dd($lastCheck) --}}

                                        <td>
                                            @if ($lastCheck != '')
                                                @php
                                                    echo $lastCheck;
                                                @endphp
                                            @else
                                                "N/A"
                                            @endif
                                        </td>

                                        {{-- <td>
                                            {{ showDateTime($user->created_at) }} <br>
                                            {{ diffForHumans($user->created_at) }}
                                        </td> --}}

                                        <td>
                                            <div class="button--group">
                                                <a href="{{ route('admin.users.detail', $user->id) }}"
                                                    class="btn btn-sm btn-outline--primary">
                                                    <i class="las la-desktop"></i> @lang('Details')
                                                </a>
                                                @if (request()->routeIs('admin.users.kyc.pending'))
                                                    <a href="{{ route('admin.users.kyc.details', $user->id) }}"
                                                        target="_blank" class="btn btn-sm btn-outline--dark">
                                                        <i class="las la-user-check"></i>@lang('KYC Data')
                                                    </a>
                                                @endif
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
                @if ($users->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($users) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-search-form placeholder="Username / Email" />
@endpush
