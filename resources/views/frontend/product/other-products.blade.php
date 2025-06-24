<div class="other-products">
    <h2 class="section-title">{{ $settings['similar.cars'] }}</h2>
    <div class="other-products-slide swiper">
        <div class="swiper-wrapper">
            @foreach ($products as $product)
            <div class="other-product swiper-slide">
                <a href="{{route('product.show',['language' =>app()->getLocale(),'slug'=>$product->slug]  )}}" class="product-card">
                    <div class="card-head">
                        <div class="brand-logo-title">
                            <div class="brand_logo">
                                <img src="{{asset($product->brend->image)}}" alt="">
                            </div>
                            <h3 class="brandName">{{$product->brend->name_az}}</h3>
                        </div>
                        <h4 class="brand-model">{{$product->model->name_az}}</h4>
                    </div>
                    <div class="card-img">
                        <img src="{{asset($product->image)}}" alt="">
                        @if($product->sale_status == 1)
                        <div class="tag">{{__('frontend.activeSaleStatus')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        @foreach ($product->productIcons as $item)
                    <div class="card-detail-item">
                        <img src="{{asset($item->icon)}}" alt="">
                        <p>{{$item->title_az}}</p>
                    </div>
                    @endforeach
                    </div>
                </a>
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
</div>
