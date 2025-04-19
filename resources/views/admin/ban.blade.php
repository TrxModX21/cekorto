@extends('admin.layouts.app')

@section('panel')
    <section class="maintenance-page flex-column justify-content-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-6 text-center">
                    <div class="card custom--card">
                        <div class="card-body">
                            <h1 class="text-center text--danger">@lang('YOU ARE BANNED')</h1>
                            <p class="fw-bold mb-1">@lang('Reason'):</p>
                            <p>@lang('Report to your manager.')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        body {
            background-color: #dddddd;
        }

        .maintenance-page {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            min-height: 100vh;
        }
    </style>
@endpush
