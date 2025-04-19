@extends('admin.layouts.app')

@section('panel')
    <form action="{{ route('admin.symptom.store', $symptom->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg--primary">
                        <h5 class="card-title text-white pt-2">{{ __($symptom->name) }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Symptom name')"
                                        name="name" value="{{ $symptom->name }}" required />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('Slug')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Slug')"
                                        name="slug" value="{{ $symptom->slug }}" required />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('Code')</label>
                                    <input type="text" class="form-control" placeholder="@lang('A00')"
                                        name="code" value="{{ $symptom->code }}" minlength="3" maxlength="4"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>@lang('Description')</label>

                                    <textarea name="description" rows="2" class="form-control" maxlength="200"
                                        placeholder="@lang('Short description for ') {{ __($symptom->name) }} @lang('symptom.')">{{ $symptom->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        @lang('Status')
                                        <span class="text--danger">*</span>
                                    </label>

                                    <input type="checkbox" data-height="46px" data-width="100%" data-onstyle="-success"
                                        data-offstyle="-danger" data-bs-toggle="toggle" data-on="@lang('Active')"
                                        data-off="@lang('Not Active')" name="status"
                                        @if ($symptom->status) checked @endif>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Details')</label>
                                    <textarea name="details" rows="10" class="form-control nicEdit">{{ $symptom->details }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.symptom.all') }}" />
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            }

            $("input[name=name]").on('keyup', function() {
                let name = $(this).val();
                var slug = slugify(name);
                $("input[name=slug]").val(slug)
            });
        })(jQuery);
    </script>
@endpush
