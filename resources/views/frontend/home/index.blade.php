<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/jquery-nice-select-1.1.0/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/select2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/swiper/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/index.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{asset($logo->fav_icon)}}">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <div class="home">
        <video src="{{ asset($home->banner) }}" autoplay muted playsinline loop></video>
        <nav>
            <div class="navbar-container">
                <a href="/{{ app()->getLocale() }}" class="navbar-logo">
                    <img class="logoDark" src="{{ asset($logo?->image) }}" alt="">

                    <img class="logoWhite" src="{{ asset($logo?->image_light) }}" alt="">
                </a>
                <div class="navbar-right">
                    <form class="nav-search" action="{{ route('brend', ['language' => app()->getLocale()]) }}">
                        <button class="searchBtn" type="submit">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.16675 17.4167C11.3548 17.4167 13.4532 16.5475 15.0004 15.0003C16.5476 13.4531 17.4167 11.3547 17.4167 9.16667C17.4167 6.97863 16.5476 4.88021 15.0004 3.33303C13.4532 1.78586 11.3548 0.916664 9.16675 0.916664C6.97871 0.916664 4.88029 1.78586 3.33312 3.33303C1.78594 4.88021 0.916748 6.97863 0.916748 9.16667C0.916748 11.3547 1.78594 13.4531 3.33312 15.0003C4.88029 16.5475 6.97871 17.4167 9.16675 17.4167ZM9.16675 15.4752C8.3383 15.4752 7.51797 15.312 6.75259 14.995C5.98721 14.6779 5.29176 14.2132 4.70596 13.6274C4.12017 13.0416 3.65549 12.3462 3.33845 11.5808C3.02142 10.8154 2.85825 9.99511 2.85825 9.16667C2.85825 8.33822 3.02142 7.51789 3.33845 6.75251C3.65549 5.98712 4.12017 5.29168 4.70596 4.70588C5.29176 4.12008 5.98721 3.6554 6.75259 3.33837C7.51797 3.02134 8.3383 2.85816 9.16675 2.85816C10.8399 2.85816 12.4445 3.52281 13.6275 4.70588C14.8106 5.88895 15.4752 7.49355 15.4752 9.16667C15.4752 10.8398 14.8106 12.4444 13.6275 13.6274C12.4445 14.8105 10.8399 15.4752 9.16675 15.4752ZM14.5714 17.4167L16.7952 21.0833H18.9402L16.7155 17.4167H14.5714Z"
                                    fill="#1E1E1E" />
                            </svg>

                        </button>
                        <input value="{{ request()->query('query') }}" type="text" name="query"
                            placeholder="AVATR,XPENG,SKODA....">
                    </form>
                    <a href="" class="whatsapp">
                        <img src="{{ asset('frontend/assets/icons/whatsapp-white.svg') }}" alt="">
                        <p>Whatsapp</p>
                    </a>
                    <button class="test_drive" type="button">
                        <img src="{{ asset('frontend/assets/icons/test_drive.svg') }}" alt="">
                        <p>{{ $settings['test.drive'] }}</p>
                    </button>
                    <a href="{{ route('contact.us') }}" class="contactPage-link">
                        <img src="{{ asset('frontend/assets/images/phone-white.svg') }}" alt="">
                        <p>{{ $settings['contact.us'] }}</p>
                    </a>



                    @php
                        $currentLang = app()->getLocale();
                        $langs = ['az', 'en', 'ru'];
                    @endphp

                    <div class="lang">
                        <button class="current-lang" type="button">
                            <span>{{ strtoupper($currentLang) }}</span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10L12 15L17 10H7Z" fill="#414141" />
                            </svg>
                        </button>
                        <div class="other-langs">
                            @foreach ($langs as $lang)
                                @if ($lang !== $currentLang)
                                    <a href="{{ url($lang) }}" class="lang-item">{{ strtoupper($lang) }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>




                    {{-- @php
                        $currentLang = app()->getLocale();
                        $langs = ['az', 'en', 'ru'];
                    @endphp

                    <div class="lang">
                        <button class="current-lang" type="button">
                            <span>{{ strtoupper($currentLang) }}</span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10L12 15L17 10H7Z" fill="#414141"/>
                            </svg>
                        </button>
                        <div class="other-langs">
                            @foreach ($langs as $lang)
                            @php
                             $slug = 'slug_'.$lang;
                            @endphp
                                @if ($lang !== $currentLang)
                                    <a href="{{ url($lang) }}/doctor-detail/{{$doctor->$slug}}" class="lang-item">{{ strtoupper($lang) }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div> --}}





                    <button class="themeModeBtn" type="button">
                        <img src="{{ asset('frontend/assets/icons/moon.svg') }}" alt="" class="moon">
                        <img src="{{ asset('frontend/assets/icons/moon-white.svg') }}" alt=""
                            class="moon-white">
                        <img src="{{ asset('frontend/assets/icons/sun.svg') }}" alt="" class="sun">
                    </button>
                    <a href="" class="nav-phone">*{{ $logo->phone_title }}</a>
                    <button class="hamburger" type="button">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 6.5H20M5 12H20M5 17.5H20" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
        <div class="home-hero">
            <h1>{{ $home->title }}</h1>
            <form action="{{ route('brend') }}" method="GET" id="filterForm">
                <input type="hidden" name="min_price">
                <input type="hidden" name="max_price">
                <div class="form-items">
                    <div class="form-item">
                        <select name="brend_id" id="brend_id" class="nice-select">
                            <option value="" disabled selected>{{ $settings['brand'] }}</option>
                            @foreach ($brends as $b)
                                <option value="{{ $b->id }}">{{ $b->name_az }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="line"></div>
                    <div class="form-item">
                        <select name="model_id" id="model_id" class="nice-select">
                            <option value="">{{ $settings['model'] }}</option>
                            @foreach ($models as $model)
                                <option value="{{ $model->id }}">{{ $model->name_az }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="line"></div>
                    <div class="form-item">
                        <select name="fuel_id" id="fuel_id" class="nice-select">
                            <option value="">{{ $settings['fuel.type'] }}</option>
                            @foreach ($fuels as $fuel)
                                <option value="{{ $fuel->id }}">{{ $fuel->name_az }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="line"></div>
                    <div class="form-item">
                        <select name="status[]" id="" class="nice-select">
                            <option value="">{{ $settings['car.status'] }}</option>
                            <option value="1">{{ $settings['new'] }}</option>
                            <option value="0">{{ $settings['drove'] }}</option>
                        </select>
                    </div>
                    <div class="line"></div>
                    <div class="form-item">
                        <select name="" onchange="get_price_interval(this)" id="price_interval"
                            class="nice-select">
                            <option value="">{{ $settings['price'] }}</option>
                            @foreach ($prices as $price)
                                <option value="{{ $price->id }}">{{ $price->min_price }}-{{ $price->max_price }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="homeSearchBtn" type="submit">
                    {{ $settings['search'] }}
                </button>
            </form>
            <div class="home-brands">
                @foreach ($brends as $brend)
                    <a href="{{ $brend->url ? $brend->url : route('brend', ['brend_id' => $brend->id ?? '', 'language' => app()->getLocale()]) }}"
                        class="home-brand-item">
                        <div class="brand-img">
                            <img src="{{ asset($brend->image) }}" alt="">
                        </div>
                        <p>{{ $brend->name }}</p>
                    </a>
                @endforeach


            </div>
        </div>
        @include('frontend.layouts.footer')
    </div>
    @include('frontend.layouts.test-drive')
    @include('frontend.layouts.mobile-menu')
    <script src="{{ asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/select2/select.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select.nice-select').niceSelect();
            $('select.select2').select2();
        });
    </script>
    <script src="{{ asset('frontend//assets/swiper/swiper.js') }}"></script>
    <script src="{{ asset('frontend//assets/index.js') }}"></script>
    <script>
        $(document).ready(function() {
            let notFoundText = "{{ $settings['not_found_model'] }}";
            let locale = "{{ app()->getLocale() }}";

            $('#brend_id').change(function() {
                let modelSelect = $('#model_id');
                let priceIntervalSelect = $('#price_interval');
                modelSelect.empty();
                priceIntervalSelect.empty();

                $.ajax({
                    type: "GET",
                    url: '/get-models/' + this.value,
                    success: function(data) {
                        if (data.length > 0) {
                            data.unshift({
                                id: "",
                                name_az: "{{ $settings['model'] }}",
                            });
                            $.map(data, function(a) {
                                if (a.id) {
                                    modelSelect.append(
                                        '<option value="' + a.id + '">' + a[
                                            'name_' +
                                            locale] + '</option>'
                                    );
                                } else {
                                    modelSelect.append(
                                        '<option disabled selected value="' + a.id +
                                        '">' + a['name_' +
                                            locale] + '</option>'
                                    );
                                }
                            });
                        } else {
                            modelSelect.append("<option value='' disabled selected >" +
                                "{{ $settings['model'] }}" + "</option>");
                        }
                        modelSelect.niceSelect('update');
                    }
                });

                $.ajax({
                    type: "GET",
                    url: '/get-prices/' + this.value,
                    success: function(data) {
                        if (data.length > 0) {
                            data.unshift({
                                id: "",
                                name_az: "{{ $settings['price'] }}",
                            });
                            $.map(data, function(a) {
                                if (a.id) {
                                    priceIntervalSelect.append(
                                        '<option value="' + a.id + '">' + a
                                        .min_price + ' - ' + a.max_price +
                                        '</option>'
                                    );
                                } else {
                                    priceIntervalSelect.append(
                                        '<option selected value="' + a.id + '">' + a
                                        .name_az + '</option>'
                                    );
                                }
                            });
                        } else {
                            priceIntervalSelect.append("<option value='' disabled selected >" +
                                "{{ $settings['price'] }}" + "</option>");
                        }
                        priceIntervalSelect.niceSelect('update');
                    }
                })
            });

            $('#model_id').change(function() {
                let notFoundText = "{{ $settings['not_found_model'] }}";
                let fuelSelect = $('#fuel_id');

                fuelSelect.empty();


                $.ajax({
                    type: "GET",
                    url: '/get-fuels/' + this.value,
                    success: function(data) {
                        if (data.length > 0) {
                            data.unshift({
                                id: "",
                                name_az: "{{ $settings['fuel.type'] }}",
                            });
                            $.map(data, function(a) {
                                if (a.id) {
                                    fuelSelect.append(
                                        '<option value="' + a.id + '">' + a[
                                            'name_' +
                                            locale] + '</option>'
                                    );
                                } else {
                                    fuelSelect.append(
                                        '<option disabled selected value="' + a.id +
                                        '">' + a['name_' +
                                            locale] + '</option>'
                                    );
                                }
                            });
                        } else {
                            fuelSelect.append("<option value='' disabled selected >" +
                                "{{ $settings['fuel.type'] }}" + "</option>");
                        }
                        fuelSelect.niceSelect('update');
                    }
                })


            });
        });

        function get_price_interval(item) {
            let id = item.value;
            let url = `/get-price-interval/${id}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('[name="min_price"]').value = data.min_price;
                        document.querySelector('[name="max_price"]').value = data.max_price;
                    }
                });
        }
    </script>


    <script>
        $(function() {

            $("#testDrive").on("submit", function(e) {
                e.preventDefault();
                let formdata = new FormData(this);
                formdata.append("_token", '{{ csrf_token() }}')
                formdata.append('brend_id', $("#testDrive").find('[name="brend_id"]').siblings(
                    '.nice-select').find('.selected').attr('data-value'))
                formdata.append('model_id', $("#testDrive").find('[name="model_id"]').siblings(
                    '.nice-select').find('.selected').attr('data-value'))

                var _form = this;
                $.ajax({
                    url: "{{ route('testDrive', ['language' => app()->getLocale()]) }}",
                    type: "post",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(e) {
                        $(".errorAlert").remove()
                        toastr.success(e.message)
                        _form.reset();
                        window.location.href = "/{{ app()->getLocale() }}/success"
                    },
                    error: function(e) {
                        var errors = e.responseJSON.errors;
                        console.log(errors)
                        $(".errorAlert").remove()
                        for (a in errors) {
                            for (b in errors[a]) {

                                toastr.error(errors[a][b])

                                $("#testDrive").find("[name='" + a + "']").after(
                                    "<p class='errorAlert' style='color:red;'>" + errors[a][
                                        b
                                    ] + "</p>")
                            }
                        }

                    }
                })
            })
        })
    </script>

</body>

</html>
