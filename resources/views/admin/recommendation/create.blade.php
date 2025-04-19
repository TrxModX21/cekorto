@extends('admin.layouts.app')

@section('panel')
    <form action="{{ route('admin.recommendation.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg--primary">
                        <h5 class="card-title text-white pt-2">{{ __($pageTitle) }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>@lang('Title')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Recommendation Title')"
                                        name="title" value="{{ old('title') }}" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('Priority')</label>
                                    <select class="form-control" name="priority" required>
                                        <option value="1">@lang('High')</option>
                                        <option value="2">@lang('Medium')</option>
                                        <option value="3">@lang('Low')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Short Description')</label>

                                    <textarea name="description" rows="2" class="form-control" maxlength="200" placeholder="@lang('Short description for this recommendation.')">{{ old('description') }}</textarea>
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
    <x-back route="{{ route('admin.recommendation.all') }}" />
@endpush
