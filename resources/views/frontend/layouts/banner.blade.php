<div class="discover_auto_container">
    <div class="discover_auto">
        <h2><span>{{ $settings['banner.title'] }}</h2>
        <div class="desktop_ban_types">
            @foreach ($banners as $banner)
            <div class="ban_type">
                <div class="icon">
                    <img src="{{asset($banner->image)}}" alt="">
                </div>
                <p>{{$banner->title}}</p>
            </div>
            @endforeach


        </div>
        <div class="ban_types_slide swiper">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                <div class="ban_type swiper-slide">
                    <div class="icon">
                        <img src="{{asset($banner->image)}}" alt="">
                    </div>
                    <p>{{$banner->title}}</p>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
