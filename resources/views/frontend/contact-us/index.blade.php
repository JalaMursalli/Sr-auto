@extends('frontend.layouts.layout')
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
                <a href="/{{ $lang }}/contact-us{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}"
                    class="lang-item">{{ strtoupper($lang) }}</a>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
<div class="contact-container">
    <div class="breadcrump-container">
        <a href="{{route('home')}}" class="breadcrump-item">{{ $settings['main.page'] }} <span>>></span></a>
        <a href="{{route('contact.us')}}" class="breadcrump-item-current">{{ $settings['contact.us'] }}</a>
    </div>
    <h1 class="title">{{ $settings['contact.us'] }}</h1>
    <div class="contact-boxes">
        @foreach ($contacts as $contact )
        <div class="contact-box">
            <button class="contact-box-btn" type="button">
                <div class="branch-logo">
                    <img src="{{$contact->brend->image}}" alt="">
                </div>
                <h2 class="branch_name">{{$contact->brend->name}}</h2>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 10L12 15L17 10H7Z" fill="#1E1E1E"/>
                </svg>
            </button>
            <div class="contact-box-inner">
                <div class="branch-logo-name">
                    <div class="branch-logo">
                        <img src="{{$contact->brend->image}}" alt="">
                    </div>
                    <h2 class="branch_name">{{$contact->brend->name}}</h2>
                </div>
                <div class="line"></div>
                <div class="contact-sales-box">
                    <h2 class="box-title"> {{ $settings['contact.sales'] }}</h2>
                    <div class="contact-items">
                        <div class="contact-item">
                            <p>{{ $settings['address'] }} :</p>
                            <div class="contact-item-links">
                                <div class="contact-item-link">{{$contact->sale_address}}</div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <p>{{ $settings['contact.number'] }} :</p>
                            <div class="contact-item-links">
                                @if (!is_null($contact->sale_contact_number1))
                                     <a href="tel:{{ $contact->sale_contact_number1 }}" class="contact-item-link">{{$contact->sale_contact_number1}}</a>
                                @endif
                                 @if (!is_null($contact->sale_contact_number2))
                                     <a href="tel:{{ $contact->sale_contact_number2 }}" class="contact-item-link">{{$contact->sale_contact_number2}}</a>
                                @endif
                                 @if (!is_null($contact->sale_contact_number3))
                                     <a href="tel:{{ $contact->sale_contact_number3 }}" class="contact-item-link">{{$contact->sale_contact_number3}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="contact-item">
                            <p>{{ $settings['email'] }} :</p>
                            <div class="contact-item-links">
                                <a href="mailto:{{ $contact->sale_email }}" class="contact-item-link">{{$contact->sale_email}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="contact-service-box">
                    <h2 class="box-title">{{ $settings['contact.service'] }}</h2>
                    <div class="contact-items">
                        <div class="contact-item">
                            <p>{{ $settings['address'] }} :</p>
                            <div class="contact-item-links">
                                <div class="contact-item-link">{{$contact->service_address}}</div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <p>{{ $settings['contact.number'] }} :</p>
                            <div class="contact-item-links">
                                 @if (!is_null($contact->service_contact_number1))
                                     <a href="tel:{{ $contact->service_contact_number1 }}" class="contact-item-link">{{$contact->service_contact_number1}}</a>
                                @endif
                                 @if (!is_null($contact->service_contact_number2))
                                     <a href="tel:{{ $contact->service_contact_number2 }}" class="contact-item-link">{{$contact->service_contact_number2}}</a>
                                @endif
                                 @if (!is_null($contact->service_contact_number3))
                                     <a href="tel:{{ $contact->service_contact_number3 }}" class="contact-item-link">{{$contact->service_contact_number3}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="contact-item">
                            <p>{{ $settings['email'] }} :</p>
                            <div class="contact-item-links">
                                <a href="mailto:{{ $contact->service_email }}" class="contact-item-link">{{$contact->service_email}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="branch-sosials-box">
                    <h2 class="box-title">{{ $settings['social.networks'] }}</h2>
                    <div class="branch-sosials">
                        @foreach ($contact?->brend?->socials as $social )
                            <a href="{{$social->url}}" class="branch-sosial-item">
                            <img src="{{ asset($social->icon) }}" alt="">
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="line"></div>
                <div class="address-road">
                    <h2 class="box-title">{{ $settings['address.path'] }}</h2>
                    <a href="{{$contact->waze_url}}" class="openWaze">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.5396 9.45328C24.2203 13.478 22.0893 17.3245 18.2348 19.2094C18.8442 20.8078 17.6535 22.5 15.9698 22.5C15.3494 22.4995 14.7528 22.261 14.303 21.8337C13.8533 21.4063 13.5846 20.8227 13.5524 20.2031C13.2506 20.212 10.5431 20.2031 9.97448 20.1731C9.96163 20.4912 9.88622 20.8037 9.75255 21.0926C9.61888 21.3816 9.42957 21.6414 9.19545 21.8571C8.96133 22.0729 8.68699 22.2404 8.3881 22.35C8.08921 22.4597 7.77164 22.5094 7.45354 22.4963C5.86635 22.4325 4.73714 20.8631 5.25042 19.3125C3.5062 18.698 1.85011 17.678 0.58073 15.9938C-0.0286447 15.1838 0.55823 14.0344 1.55761 14.0344C3.72839 14.0344 3.06792 11.4952 3.58026 8.86594C4.44417 4.4625 9.05292 1.5 13.5046 1.5C18.3084 1.5 22.746 4.81266 23.5396 9.45328ZM17.5087 18.2006C19.4774 17.3016 21.321 15.5423 22.0223 13.4128C23.9198 7.64297 19.0153 2.72531 13.5046 2.72531C9.59292 2.72531 5.52089 5.32312 4.78261 9.10031C4.33589 11.393 5.01698 15.2573 1.55995 15.2573C2.72901 16.8094 4.29417 17.7239 5.95354 18.2597C7.10948 17.2378 8.94745 17.5345 9.69557 18.9319C10.3621 18.9788 13.4076 18.9872 13.8159 18.9703C13.9808 18.6483 14.2156 18.3673 14.5033 18.1479C14.791 17.9285 15.1241 17.7763 15.4783 17.7025C15.8324 17.6287 16.1986 17.6351 16.55 17.7213C16.9013 17.8075 17.2289 17.9713 17.5087 18.2006ZM9.61542 8.77172C9.61542 7.14328 11.9985 7.14281 11.9985 8.77172C11.9985 10.4006 9.61542 10.4002 9.61542 8.77172ZM15.0796 8.77172C15.0796 7.14328 17.4637 7.14281 17.4637 8.77172C17.4637 10.4006 15.0796 10.4006 15.0796 8.77172ZM9.33229 12.0853C9.17104 11.2913 10.372 11.0456 10.5332 11.8411L10.536 11.8542C10.7301 12.8583 11.9353 13.9167 13.5417 13.8731C15.2142 13.8291 16.319 12.832 16.5468 11.8683C16.7559 11.1159 17.8874 11.3827 17.7407 12.1495C17.4956 13.1892 16.2778 15.0558 13.4535 15.098C11.459 15.098 9.66229 13.793 9.33323 12.0863L9.33229 12.0853Z" fill="white"/>
                        </svg>
                       {{ $settings['open.with.waze'] }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @include('frontend.contact-us.suggest-complains')
</div>
@endsection
