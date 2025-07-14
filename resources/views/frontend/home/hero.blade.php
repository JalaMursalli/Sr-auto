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
                 <select name="" onchange="get_price_interval(this)" id="price_interval" class="nice-select">
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
                 <p>{{ $brend->name_az }}</p>
             </a>
         @endforeach


     </div>
 </div>
