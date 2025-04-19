{{-- DIAGNOSE RESULT MODAL --}}
@if ($results || $diagnose)
    @php
        $recommendations = [
            'Kurangi asupan garam',
            'Olahraga teratur 30 menit/hari',
            'Kontrol tekanan darah setiap minggu',
            'Hindari stres berlebihan',
            'TODO THIS',
        ];
        $fullname = $user->firstname . ' ' . $user->lastname;
    @endphp

    <div class="modal fade" id="diagnoseResult" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="diagnoseResultLabel">@lang('Diagnostic results for patients: '){{ $fullname }}</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-none-30">
                        <div class="col-xl-3 col-lg-4 mb-30">
                            <div class="card b-radius--5 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="d-flex p-3 bg--primary align-items-center">
                                        <div class="avatar avatar--lg">
                                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile')) }}"
                                                alt="@lang('Image')">
                                        </div>
                                        <div class="ps-3">
                                            <h4 class="text--white">{{ $fullname }}</h4>
                                        </div>
                                    </div>

                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Firstname')
                                            <span class="fw-bold">{{ $user->firstname }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Lastname')
                                            <span class="fw-bold">{{ $user->lastname }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Username')
                                            <span class="fw-bold">{{ '@' . $user->username }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            @lang('Email')
                                            <span class="fw-bold">{{ $user->email }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 mb-30">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-30 border-bottom pb-2">@lang('Full Diagnose Result')</h5>

                                    <div class="col-md-12 mb-30">
                                        <div class="card bl--5 border--primary">
                                            <div class="card-body">
                                                <h6 class="text--primary">TODO:: Kemungkinan penyakit yang dialami:
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="list-group">
                                        @forelse ($results as $result)
                                            <li
                                                class="list-group-item flex-wrap flex-sm-nowrap gap-2 justify-content-between align-items-center">
                                                <div class="symptomContainer">
                                                    <p class="fw-bold mb-0 symptomName">
                                                        {{ __($result['disease']->name) }}
                                                    </p>
                                                    <p class="mb-0">
                                                        <small>@lang('Possible Percentage: ')</small>
                                                        <b>{{ $result['percentage'] }}%</b>
                                                    </p>
                                                </div>

                                                <div class="button--group mt-0">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline--dark ms-1 mb-2 diseaseDetails"
                                                        style="margin-right: 10px;"
                                                        data-title="@lang('Learn more about '){{ __($result['disease']->name) }}"
                                                        data-details="{{ __($result['disease']->details) }}">
                                                        <i class="la la-question"></i> @lang('Details')
                                                    </button>
                                                </div>
                                            </li>
                                        @empty
                                            <div class="col-md-12 mb-30">
                                                <div class="card bl--5 border--orange">
                                                    <div class="card-body">
                                                        <h6 class="text--orange">TODO:: TEXT DATA PENYAKIT TIDAK
                                                            TERDETEKSI
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 mb-30">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">@lang('Selected Symptoms')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($diagnose->symptoms as $symptom)
                                            <li class="list-group-item d-flex align-items-start">
                                                <div class="me-3 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                    style="width: 24px; height: 24px;">{{ $loop->index + 1 }}
                                                </div>
                                                <span>{{ __($symptom->name) }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @if ($results)
                            <div class="col-xl-12 mb-30">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">@lang('Recommendation')</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($recommendations as $index => $recommendation)
                                                <li class="list-group-item d-flex align-items-start">
                                                    <div class="me-3 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                        style="width: 24px; height: 24px;">{{ $index + 1 }}
                                                    </div>
                                                    <span>{{ $recommendation }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- DISEASE OFFCANVAS DETAILS --}}
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small"></div>
</div>

@push('script')
    <script>
        (function($) {
            "use strict";

            @if ($results || $diagnose)
                var diagnoseResult = $('#diagnoseResult');
                setTimeout(() => {
                    diagnoseResult.modal('show');
                }, 1000);

                var offcanvas = $('#offcanvasBottom');
                var bsOffcanvas = new bootstrap.Offcanvas(offcanvas);

                $(document).on('click', '.diseaseDetails', function() {
                    var modal = $('#offcanvasBottom');
                    let title = $(this).data('title');
                    let details = $(this).data('details');
                    let dataDetails = details != '' ? details :
                        "<div class='col-md-12 mb-30'><div class='card bl--5 border--danger'> <div class='card-body'> <h4 class='text--danger text-center'>@lang('No explanation yet')</h4> </div></div></div>";

                    modal.find('.offcanvas-title').html(title);
                    modal.find('.offcanvas-body').html(dataDetails);
                    bsOffcanvas.show();
                });

                $(document).on('click', '#offcanvasBottomLabel', function() {
                    bsOffcanvas.hide();
                });
            @endif

        })(jQuery);
    </script>
@endpush
