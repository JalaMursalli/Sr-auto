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
                <a href="/{{ $lang }}/success{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}"
                    class="lang-item">{{ strtoupper($lang) }}</a>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
    <div class="success-container">
        <div class="success-img">
            <img src="{{$success->image}}" alt="">
        </div>
        <h1>{{$success->title}}</h1>
        <div class="desc">
            <p>{{$success->description}}</p>
        </div>
        <a href="{{$success->url}}" class="backLink">{{$success->btn_title}}</a>
    </div>
@endsection
