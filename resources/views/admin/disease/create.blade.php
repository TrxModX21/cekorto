@extends('admin.layouts.app')

@section('panel')
    <form action="{{ route('admin.disease.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg--primary">
                        <h5 class="card-title text-white pt-2">{{ __($pageTitle) }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Disease name')"
                                        name="name" value="{{ old('name') }}" required />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('Slug')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Slug')"
                                        name="slug" required />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('Code')</label>
                                    <input type="text" class="form-control" placeholder="A00"
                                        name="code" minlength="3" maxlength="4" required />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Description')</label>

                                    <textarea name="description" rows="2" class="form-control" maxlength="200" placeholder="@lang('Short description for disease.')">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Details')</label>
                                    <textarea name="details" rows="10" class="form-control nicEdit"></textarea>
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
    <x-back route="{{ route('admin.disease.all') }}" />
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
