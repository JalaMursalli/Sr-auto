@extends('frontend.layouts.layout')
@section('language')
<div class="lang">
    <button class="current-lang" type="button">
        <span>{{ strtoupper(app()->getLocale()) }}</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M7 10L12 15L17 10H7Z" fill="#414141" />
        </svg>
    </button>
    <div class="other-langs">
        @foreach (['az', 'en', 'ru'] as $lang)
            @if($lang == app()->getLocale())
                @continue
            @endif
            @php
            $slug = 'slug_'.$lang;
            @endphp

            <a href="/{{$lang}}/product-details/{{$productDetail->$slug}}" class="lang-item">{{ strtoupper($lang) }}</a>
        @endforeach
    </div>
</div>
@endsection
@section('content')
<div class="model-detail-head">
    <div class="brand-logo">
        <img src="{{asset($brend?->image)}}" alt="">
    </div>
    <h1 class="brand_name">{{$productDetail?->name}}</h1>


    <h2 class="model_name">{{$productDetail?->model?->name}}</h2>
    <button class="shareBtn" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.3363 3.221L3.87334 8.71C3.80594 8.73241 3.74695 8.77481 3.70421 8.83155C3.66147 8.8883 3.63702 8.9567 3.63409 9.02768C3.63116 9.09865 3.64989 9.16884 3.68781 9.22891C3.72572 9.28899 3.78101 9.3361 3.84634 9.364L9.89634 11.957C9.92805 11.9707 9.96276 11.976 9.99711 11.9723C10.0315 11.9686 10.0643 11.9561 10.0923 11.936L16.0233 7.698C16.2073 7.568 16.4333 7.794 16.3033 7.978L12.0653 13.909C12.0456 13.9371 12.0333 13.9697 12.0298 14.0039C12.0263 14.038 12.0317 14.0725 12.0453 14.104L14.6373 20.154C14.6651 20.2194 14.7122 20.2747 14.7722 20.3127C14.8322 20.3507 14.9023 20.3695 14.9733 20.3667C15.0443 20.3639 15.1127 20.3395 15.1695 20.2969C15.2263 20.2543 15.2688 20.1954 15.2913 20.128L20.7803 3.664C20.801 3.60229 20.804 3.53604 20.7891 3.4727C20.7742 3.40936 20.7419 3.35142 20.6959 3.30541C20.6499 3.25939 20.592 3.22712 20.5286 3.21221C20.4653 3.1973 20.3981 3.20034 20.3363 3.221Z" fill="#1E1E1E"/>
        </svg>
        <p>{{ $settings['share'] }}</p>
    </button>
    <div class="shared_box">
        @foreach ($shares as $share )
        <a href="{{$share->url}}" class="shared-item">
            <img src="{{$share->icon}}" alt="">
        </a>
        @endforeach
        <button class="copy_btn" type="button">
            <i class="bi bi-share"></i>
        </button>
        <button class="close_shared_box" type="button">
            <i class="bi bi-x-circle"></i>
        </button>
    </div>
</div>
<div class="product-detail-main">

    <div class="product-images">
        <div class="product-gallery-slide swiper">
            <div class="swiper-wrapper">

                    @foreach ($productDetail->productImages as $gallery )
                    <div class="gallery-item swiper-slide">
                            <img src="{{asset($gallery->image)}}" alt="">
                    </div>
                    @endforeach



            </div>
            <div class="swiper-buttons">
                <div class="swiper-button-prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5361 2.58955L6.84454 11.2967C6.76631 11.3715 6.70422 11.4615 6.66212 11.5612C6.62002 11.6609 6.59879 11.7681 6.59974 11.8763C6.59926 11.987 6.62064 12.0966 6.66265 12.199C6.70466 12.3013 6.76647 12.3944 6.84454 12.4727C9.98854 15.5399 13.0185 18.5003 15.9345 21.3539C16.0845 21.4943 16.6845 21.8435 17.1477 21.3251C17.6109 20.8055 17.3301 20.3531 17.1477 20.1659L8.66614 11.8763L16.7625 3.76555C17.0577 3.35835 17.0337 2.98275 16.6905 2.63875C16.3465 2.29475 15.9617 2.27755 15.5361 2.58955Z" fill="white"/>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46386 2.58955L17.1555 11.2967C17.2337 11.3715 17.2958 11.4615 17.3379 11.5612C17.38 11.6609 17.4012 11.7681 17.4003 11.8763C17.4007 11.987 17.3794 12.0966 17.3374 12.199C17.2953 12.3013 17.2335 12.3944 17.1555 12.4727C14.0115 15.5399 10.9815 18.5003 8.06546 21.3539C7.91546 21.4943 7.31546 21.8435 6.85226 21.3251C6.38906 20.8055 6.66986 20.3531 6.85226 20.1659L15.3339 11.8763L7.23746 3.76555C6.94226 3.35835 6.96626 2.98275 7.30946 2.63875C7.65346 2.29475 8.03826 2.27755 8.46386 2.58955Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
        @if($productDetail->sale_status == 1)
        <p class="campaign-tag">{{__('frontend.activeSaleStatus')}}</p>
        @endif
    </div>

    <div class="product-detail-right">
        <div class="product-detail">
            <div class="detail-tags">
                <div class="tag-item">
                    <img src="{{asset('frontend/assets/icons/eletrik-car.svg')}}" alt="">
                   {{$productDetail->fuel->name}}
                </div>
                <div class="tag-item">
                   {{$productDetail->year}}
                </div>
                <div class="tag-item">
                    {{$productDetail->brend->country}}
                </div>
                <div class="tag-item">
                    {{$productDetail->guarantee}}
                </div>
            </div>
            <div class="detail-items">
                @foreach ($productDetail->productIcons as $item)
                <div class="detail-item">
                    <div class="detail-item-title">
                        <img src="{{asset($item->icon)}}" alt="">
                        <span style="color: #E4712E;">{{$item->title}}</span>
                    </div>
                    <p>{{$item->value}}</p>
                </div>
                @endforeach
            </div>
        </div>
        @include('frontend.product.product-calculator')

    </div>
</div>
<div class="model-characteristics-container">
    <div class="model-characteristics-slide swiper">
        <div class="swiper-wrapper">

           @foreach($productDetail->features->groupBy('feature_group_id') as $key=>$values)

           @php
           $featureGroup = \App\Models\FeatureGroup::find($key);
           @endphp
            <div class="characteristic-box swiper-slide">
                <h3 class="box-title" style="color: {{$featureGroup->color}};">
                    <img src="/{{ $featureGroup->icon}}" alt="">
                    {{$featureGroup->name}}
                </h3>
                <div class="box-items">
                    @foreach ($values  as $value )
                    <div class="box-item">
                        <p>{{$value->key}}</p>
                        <span>{{$value->value}}</span>
                    </div>
                    @endforeach


                </div>
            </div>
            @endforeach
        </div>
    </div>
    @if ($productDetail->all_features != null)
        <a href="{{asset($productDetail->all_features)}}" download class="all-characteristics">
        {{ $settings['all_features'] }}
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.5 4.99994L11.793 4.29294L12.5 3.58594L13.207 4.29294L12.5 4.99994ZM13.5 13.9999C13.5 14.2652 13.3946 14.5195 13.2071 14.707C13.0195 14.8946 12.7652 14.9999 12.5 14.9999C12.2348 14.9999 11.9804 14.8946 11.7929 14.707C11.6053 14.5195 11.5 14.2652 11.5 13.9999H13.5ZM6.79297 9.29294L11.793 4.29294L13.207 5.70694L8.20697 10.7069L6.79297 9.29294ZM13.207 4.29294L18.207 9.29294L16.793 10.7069L11.793 5.70694L13.207 4.29294ZM13.5 4.99994V13.9999H11.5V4.99994H13.5Z" fill="white"/>
            <path d="M5.5 16V17C5.5 17.5304 5.71071 18.0391 6.08579 18.4142C6.46086 18.7893 6.96957 19 7.5 19H17.5C18.0304 19 18.5391 18.7893 18.9142 18.4142C19.2893 18.0391 19.5 17.5304 19.5 17V16" stroke="white" stroke-width="2"/>
        </svg>
    </a>
    @endif
    <div class="model-description">
        <p>{!! $productDetail->description !!}</p>
    </div>
</div>
@include('frontend.product.other-products')

@endsection
