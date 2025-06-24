@extends('frontend.layouts.layout')
@section('wp_number',$brend?->vp_url)
@section('phone_number',$brend?->phone_number)
@section('language')
    <div class="lang">
        <button class="current-lang" type="button">
            <span>{{ strtoupper(app()->getLocale()) }}</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10L12 15L17 10H7Z" fill="#414141" />
            </svg>
        </button>
        <div class="other-langs">
            @foreach (['az', 'en', 'ru'] as $lang)
                @if ($lang == app()->getLocale())
                    @continue
                @endif
                @php
                    $slug = 'slug_' . $lang;
                @endphp
                <a href="/{{ $lang }}/brends{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}"
                    class="lang-item">{{ strtoupper($lang) }}</a>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
    <div class="brands-container">
        <div class="brands-container-head">
            <div class="brand-logo-title">
                <div class="brand_logo">
                    <img src="{{ $brend?->image }}" alt="">
                </div>
                <h1>{{ $brend?->name }}</h1>
            </div>
            <button class="showFilter" type="button">
                <p>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.75 14.25H4.81875L12.15 6.91875L11.0813 5.85L3.75 13.1813V14.25ZM2.25 15.75V12.5625L12.15 2.68125C12.3 2.54375 12.4658 2.4375 12.6473 2.3625C12.8288 2.2875 13.0193 2.25 13.2188 2.25C13.4183 2.25 13.612 2.2875 13.8 2.3625C13.988 2.4375 14.1505 2.55 14.2875 2.7L15.3188 3.75C15.4688 3.8875 15.5783 4.05 15.6473 4.2375C15.7163 4.425 15.7505 4.6125 15.75 4.8C15.75 5 15.7158 5.19075 15.6473 5.37225C15.5788 5.55375 15.4693 5.71925 15.3188 5.86875L5.4375 15.75H2.25ZM11.6063 6.39375L11.0813 5.85L12.15 6.91875L11.6063 6.39375Z"
                            fill="black" />
                    </svg>
                    Filter
                </p>
                <span class="filterCount">0</span>
            </button>
            <select name="" id="" class="nice-select">
                <option value="">{{ $settings['model'] }}</option>
                @foreach ($models as $model)
                    <option @selected(request()->model_id == $model->id) value="{{ $model->id }}">{{ $model->name_az }}</option>
                @endforeach
            </select>
        </div>
        <div class="brands-main">
            <div class="brands-left">
                <div class="offer_week">
                    <div class="offer_week_box">
                        <h2>{{ $settings['week.offer'] }}</h2>
                        <div class="countdown"
                            data-countdown-date="{{ count($offers) ? $offers->first()->date->format('Y-m-d\TH:i:s') : now()->format('Y-m-d\TH:i:s') }}">
                            <div class="countdown-box">
                                <p class="days"></p>
                                <span>{{ $settings['day'] }}</span>
                            </div>
                            <div class="countdown_line"></div>
                            <div class="countdown-box">
                                <p class="hours"></p>
                                <span>{{ $settings['hour'] }}</span>
                            </div>
                            <div class="countdown_line"></div>
                            <div class="countdown-box">
                                <p class="minutes"></p>
                                <span>{{ $settings['minute'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="offer_week_slide swiper">
                        <div class="swiper-wrapper">
                            @foreach ($offers as $offer)
                                @php
                                    $product = $offer->product;
                                @endphp
                                <div class="offer_week_item swiper-slide">
                                    <a href="" class="product-card">
                                        <div class="card-img">
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                        <div class="card-body">
                                            @foreach ($product->productIcons as $item)
                                                <div class="card-detail-item">
                                                    <img src="{{ asset($item->icon) }}" alt="">
                                                    <p>{{ $item->title_az }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                @include('frontend.brend.brend-filter')
            </div>
            <div class="brands">
                <div class="all-brands">
                    @foreach ($products as $product)
                        <a href="{{ route('product.show', ['language' => app()->getLocale(), 'slug' => $product->slug]) }}"
                            class="product-card">
                            <div class="card-head">
                                <div class="brand-logo-title">
                                    <div class="brand_logo">
                                        <img src="{{ asset($product->brend->image) }}" alt="">
                                    </div>
                                    <h3 class="brandName">{{ $product->brend->name_az }}</h3>
                                </div>
                                <h4 class="brand-model">{{ $product->model->name_az }}</h4>
                            </div>
                            <div class="card-img">
                                <img src="{{ asset($product->image) }}" alt="">
                                @if ($product->sale_status == 1)
                                    <div class="tag">{{ __('frontend.activeSaleStatus') }}</div>
                                @endif
                            </div>
                            <div class="card-body">
                                @foreach ($product->productIcons as $item)
                                    <div class="card-detail-item">
                                        <img src="{{ asset($item->icon) }}" alt="">
                                        <p>{{ $item->value }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="pagination">
                    @if ($products->lastPage() > 1)
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <a href="{{ $products->url($i) }}"
                                class="pagination-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                {{ $i }}
                            </a>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateCardItemsVisibility() {
                const cardBodies = document.querySelectorAll('.card-body');
                const isMobile = window.innerWidth < 900;
                const visibleCount = isMobile ? 2 : 4;
                cardBodies.forEach(function (cardBody) {
                    const items = cardBody.querySelectorAll('.card-detail-item');
                    items.forEach(function (item, index) {
                        item.style.display = index < visibleCount ? '' : 'none';
                    });
                });
            }
            updateCardItemsVisibility();

            window.addEventListener('resize', updateCardItemsVisibility);
        });

        window.addEventListener('load', function() {
            // document.querySelectorAll(".nice-select ul li").forEach(function(item) {
                // item.addEventListener("click", function() {
                //     const brend_id = item.getAttribute("data-value");
                //     const url = new URL(window.location.href);
                //     url.searchParams.set('model_id', brend_id);
                //     window.location.href = url.toString();
                // });
            // });

            var filter = document.querySelector("#filter")
            document.querySelectorAll(".filter-brands .filter-brand-item").forEach(function(item){

                    item.addEventListener("click", function(){

                         if(item.getAttribute('data-url')){
                                window.location.href = item.getAttribute('data-url');
                            }else{
                                 filter.submit()
                        }

                    })


            })

        });
    </script>


@endsection
