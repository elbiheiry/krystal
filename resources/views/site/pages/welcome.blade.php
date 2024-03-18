<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

@include('site.layouts.head')

<body>
    <!-- Looder
    ==========================================-->
    <div class="preloader" hiddin>
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Main Section
    ==========================================-->
    <section class="steps">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form id="smartwizard" class="wizard" method="post" action="{{ route('site.store') }}">
                        @csrf
                        <ul class="nav">
                            <li>
                                <a class="nav-link" href="#step-1"> </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-2"> </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-3"> </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-4"> </a>
                            </li>

                            <li>
                                <a class="nav-link" href="#step-5"> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel">
                                <img src="{{ surl('images/logo.png') }}" />
                                <p>
                                    @if (app()->getLocale() == 'en')
                                        The platform Objective is to give general information for
                                        the foreign investors to support the FDI within the real
                                        estate market in egypt
                                    @else
                                        هدف المنصة هو إعطاء معلومات عامة عن
                                        المستثمرون الأجانب لدعم الاستثمار الأجنبي المباشر داخل الريال
                                        سوق العقارات في مصر
                                    @endif
                                </p>
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel">
                                <div class="quest_num">{{ app()->getLocale() == 'en' ? 'Question' : 'سؤال' }} 1 / 4
                                </div>
                                <div class="quest_head">
                                    @if (app()->getLocale() == 'en')
                                        Please select the type of investment you are looking for ?
                                    @else
                                        برجاء إختيار نوع الاستثمار الذي تبحث عنه ؟
                                    @endif

                                </div>
                                <div class="quest_ans">
                                    <div class="row">
                                        @foreach ($types as $type)
                                            <div class="col-12">
                                                <div class="check_item">
                                                    <input type="checkbox" name="type_ids[]"
                                                        value="{{ $type->id }}" />
                                                    <label for="{{ $type->id }}"> <span>
                                                            {{ $type->translate(app()->getLocale())->name }}
                                                        </span></label>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div id="step-3" class="tab-pane" role="tabpanel">
                                <div class="quest_num">{{ app()->getLocale() == 'en' ? 'Question' : 'سؤال' }} 2 / 4
                                </div>
                                <div class="quest_head">
                                    @if (app()->getLocale() == 'en')
                                        Please select your allocated budget ?
                                    @else
                                        برجاء إختيار الميزانية المتاحه ؟
                                    @endif

                                </div>
                                <div class="quest_ans">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="check_item">
                                                <input type="radio" name="budget" value="1000000" />
                                                <label for="1000000">
                                                    <span> {{ app()->getLocale() == 'en' ? 'Residential' : 'سكني' }}
                                                        ({{ app()->getLocale() == 'en' ? 'from' : 'تبدا من' }}
                                                        1,000,000) </span></label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="check_item">
                                                <input type="radio" name="budget" value="1500000" />
                                                <label for="1500000"><span>
                                                        {{ app()->getLocale() == 'en' ? 'Coastal' : 'ساحلي' }}
                                                        (1,500,000) </span></label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="check_item">
                                                <input type="radio" name="budget" value="700000" />
                                                <label for="700000"><span>{{ app()->getLocale() == 'en' ? 'Admin' : 'إداري' }}
                                                        (700,000) </span></label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="check_item">
                                                <input type="radio" name="budget" value="2250000" />
                                                <label for="2250000"><span>
                                                        {{ app()->getLocale() == 'en' ? 'Retail / Commercial' : 'بيع بالتجزئة / تجاري' }}
                                                        (2,250,000)
                                                    </span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="tab-pane" role="tabpanel">
                                <div class="quest_num">{{ app()->getLocale() == 'en' ? 'Question' : 'سؤال' }} 3 / 4
                                </div>
                                <div class="quest_head">
                                    {{ app()->getLocale() == 'en' ? 'Please select the location ?' : 'برجاء إختيار الموقع ؟' }}
                                </div>
                                <div class="quest_ans">
                                    <div class="row">
                                        @foreach ($locations as $location)
                                            <div class="col-md-6 col-12">
                                                <div class="check_item">
                                                    <input type="checkbox" name="location_ids[]"
                                                        value="{{ $location->id }}" />
                                                    <label for="{{ $location->id }}">
                                                        <span> {{ $location->translate(app()->getLocale())->name }}
                                                        </span></label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="step-5" class="tab-pane" role="tabpanel">
                                <div class="quest_num">{{ app()->getLocale() == 'en' ? 'Question' : 'سؤال' }} 4 / 4
                                </div>
                                <div class="quest_head">
                                    {{ app()->getLocale() == 'en' ? 'Please Enter Your Email Address' : 'برجاء إدخال بريدك الإلكتروني' }}
                                </div>
                                <input type="email" class="form-control col-md-6" name="email" />
                            </div>
                        </div>
                    </form>
                    @if (app()->getLocale() == 'en')
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="icon_link lang"> AR </a>
                    @else
                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="icon_link lang"> EN </a>
                    @endif
                    <a href="{{ route('site.index') }}" class="skip_btn">
                        {{ app()->getLocale() == 'en' ? 'Skip' : 'تخطي' }} <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('site.layouts.scripts')
    <script>
        /* Steps ==================================*/
        $(document).ready(function() {
            var btnFinish = $("<button></button>")
                .addClass("sw-btn-group-extra")
                .attr("type", "button");
            // theme1
            $("#smartwizard").smartWizard({
                transition: {
                    animation: "fade"
                },
                lang: {
                    next: "",
                    previous: "",
                },
                toolbarSettings: {
                    toolbarExtraButtons: [btnFinish],
                },
                onFinish: onFinishCallback
            });
            $('#smartwizard').on('leaveStep', function(e, anchorObject, currentStepIndex, nextStepIndex,
                stepDirection) {
                if (stepDirection == 'forward') {
                    return validateSteps(currentStepIndex + 1);
                }
            });
            $("#smartwizard").on(
                "showStep",
                function(e, anchorObject, stepNumber, stepDirection) {
                    if ($("button.sw-btn-next").hasClass("disabled")) {
                        $(".sw-btn-group-extra").show(); // show the button extra only in the last page
                    } else {
                        $(".sw-btn-group-extra").hide();
                    }
                }
            );
            $(".sw-btn-group-extra").click(function() {
                if (validateAllSteps()) {
                    $('.wizard').submit();
                }
            });

            function onFinishCallback() {
                if (validateAllSteps()) {
                    $('.wizard').submit();
                }
            }

            function validateAllSteps() {
                var isStepValid = true;

                if (validateStep1() == false) {
                    isStepValid = false;
                }

                if (validateStep2() == false) {
                    isStepValid = false;
                }

                if (validateStep3() == false) {
                    isStepValid = false;
                }

                if (validateStep4() == false) {
                    isStepValid = false;
                }

                return isStepValid;
            }

            function validateSteps(step) {
                var isStepValid = true;
                // validate step 2
                if (step == 2) {
                    if (validateStep1() == false) {
                        isStepValid = false;
                    }
                }
                if (step == 3) {
                    if (validateStep2() == false) {
                        isStepValid = false;
                    }
                }
                if (step == 4) {
                    if (validateStep3() == false) {
                        isStepValid = false;
                    }
                }
                if (step == 5) {
                    if (validateStep4() == false) {
                        isStepValid = false;
                    }
                }
                return isStepValid;
            }

            function validateStep1() {
                var data = false;

                $.ajax({
                    url: "{{ route('site.first_validation') }}",
                    method: "post",
                    data: $('.wizard').serialize(),
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        data = true;
                    },
                    error: function(jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);
                        notification("danger", response, "fas fa-times");
                        data = false;
                    }
                });
                return data;
            }

            function validateStep2() {
                var data = false;
                $.ajax({
                    url: "{{ route('site.second_validation') }}",
                    method: "post",
                    data: $('.wizard').serialize(),
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        data = true;

                    },
                    error: function(jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);
                        notification("danger", response, "fas fa-times");
                        data = false;
                    }
                });

                return data;
            }

            function validateStep3() {
                var data = false;
                $.ajax({
                    url: "{{ route('site.third_validation') }}",
                    method: "post",
                    data: $('.wizard').serialize(),
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        data = true;

                    },
                    error: function(jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);
                        notification("danger", response, "fas fa-times");
                        data = false;
                    }
                });

                return data;
            }

            function validateStep4() {
                var data = false;
                $.ajax({
                    url: "{{ route('site.fourth_validation') }}",
                    method: "post",
                    data: $('.wizard').serialize(),
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        data = true;

                    },
                    error: function(jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);
                        notification("danger", response, "fas fa-times");
                        data = false;
                    }
                });

                return data;
            }

            $(document).on('submit', '.wizard', function() {
                var form = $(this);
                var url = form.attr('action');
                var formData = new FormData(form[0]);

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        window.location.href = response;
                    },
                    error: function(jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);
                        notification("danger", response, "fas fa-times");
                    }
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    }
                });
                return false;
            });

        });
    </script>
</body>

</html>
