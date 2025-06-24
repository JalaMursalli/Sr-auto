<div class="filter-area">
    <div class="filter-head">
        <button class="closeFilter" type="button">
            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_263_25554)">
                    <path d="M10 14.5L3 8L10 1.5" stroke="black" stroke-linecap="square" />
                </g>
                <defs>
                    <clipPath id="clip0_263_25554">
                        <rect width="15" height="15" fill="white" transform="matrix(-1 0 0 1 15 0.5)" />
                    </clipPath>
                </defs>
            </svg>
            {{ $settings['back'] }}
        </button>
        <div class="count_filter_box">
            <p>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.75 14.25H4.81875L12.15 6.91875L11.0813 5.85L3.75 13.1813V14.25ZM2.25 15.75V12.5625L12.15 2.68125C12.3 2.54375 12.4658 2.4375 12.6473 2.3625C12.8288 2.2875 13.0193 2.25 13.2188 2.25C13.4183 2.25 13.612 2.2875 13.8 2.3625C13.988 2.4375 14.1505 2.55 14.2875 2.7L15.3188 3.75C15.4688 3.8875 15.5783 4.05 15.6473 4.2375C15.7163 4.425 15.7505 4.6125 15.75 4.8C15.75 5 15.7158 5.19075 15.6473 5.37225C15.5788 5.55375 15.4693 5.71925 15.3188 5.86875L5.4375 15.75H2.25ZM11.6063 6.39375L11.0813 5.85L12.15 6.91875L11.6063 6.39375Z"
                        fill="black" />
                </svg>
                {{ $settings['filter'] }}
            </p>
            <span class="filterCount">0</span>
        </div>
    </div>
    <form class="filter" action="" method="GET" id="filter">
        <div class="filter-brands">
            @foreach ($brends as $brend)


                    <div data-url="{{ $brend->url }}" class="filter-brand-item @if (request()->brend_id == $brend->id) checked @endif">
                        <div class="brand-img">
                            <img src="{{ asset($brend->image) }}" alt="">
                        </div>
                        <p>{{ $brend->name_az }}</p>
                        <input type="radio" @checked(request()->brend_id == $brend->id) name="brend_id" value="{{ $brend->id }}">
                    </div>
            @endforeach
        </div>
        <div class="filter-selects">
            <div class="filter-item @if (request()->fuelt_type) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 22H15M4 9H14M14 22V4C14 3.46957 13.7893 2.96086 13.4142 2.58579C13.0391 2.21071 12.5304 2 12 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V22M14 13H16C16.5304 13 17.0391 13.2107 17.4142 13.5858C17.7893 13.9609 18 14.4696 18 15V17C18 17.5304 18.2107 18.0391 18.5858 18.4142C18.9609 18.7893 19.4696 19 20 19C20.5304 19 21.0391 18.7893 21.4142 18.4142C21.7893 18.0391 22 17.5304 22 17V9.83C22.0002 9.56609 21.9482 9.30474 21.8469 9.06103C21.7457 8.81732 21.5972 8.59606 21.41 8.41L18 5"
                                stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <p>{{ $settings['fuel.type'] }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-check">
                    @foreach ($fuels as $fuel)
                        <div class="filter-check-item @if (request()->fuelt_type && in_array($fuel->id, request()->fuelt_type)) checked @endif">
                            <div class="icon">
                                <img src="{{ asset($fuel->icon) }}" alt="">
                            </div>
                            <p>{{ $fuel->name }}</p>
                            <input @checked(request()->fuelt_type && in_array($fuel->id, request()->fuelt_type)) type="checkbox" name="fuelt_type[]"
                                value="{{ $fuel->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="filter-item @if (request()->status) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0003 2C13.7513 2 15.1903 2.592 16.1683 3.159C17.4923 3.926 18.0003 5.369 18.0003 6.657V8.367C18.9074 8.93704 19.7833 9.55526 20.6243 10.219C20.8238 10.387 20.9497 10.6262 20.9753 10.8857C21.001 11.1452 20.9242 11.4044 20.7614 11.6081C20.5987 11.8119 20.3628 11.9439 20.104 11.9762C19.8453 12.0085 19.5841 11.9385 19.3763 11.781C18.9288 11.4287 18.4699 11.0912 18.0003 10.769V17.586C18.0003 18.7567 17.5353 19.8794 16.7075 20.7072C15.8797 21.535 14.757 22 13.5863 22H10.4143C9.24363 22 8.12091 21.535 7.29313 20.7072C6.46534 19.8794 6.0003 18.7567 6.0003 17.586V10.769C5.5333 11.093 5.0703 11.426 4.6253 11.781C4.41816 11.9468 4.15366 12.0234 3.88999 11.9942C3.62631 11.9649 3.38506 11.8321 3.2193 11.625C3.05354 11.4179 2.97685 11.1534 3.0061 10.8897C3.03536 10.626 3.16816 10.3848 3.3753 10.219C4.21661 9.55557 5.09287 8.93768 6.0003 8.368V6.657C6.0003 5.368 6.5083 3.926 7.8323 3.159C8.8103 2.592 10.2503 2 12.0003 2ZM16.0003 11.414L15.8793 11.536L15.7433 11.68C15.3136 12.1708 15.0555 12.7883 15.0083 13.439L15.0003 13.657V17L14.9953 17.15C14.9595 17.6262 14.7545 18.0738 14.4174 18.412C14.0803 18.7502 13.6333 18.9567 13.1573 18.994L13.0003 19H11.0003L10.8503 18.995C10.3741 18.9592 9.92647 18.7542 9.58827 18.4171C9.25006 18.08 9.04363 17.6331 9.0063 17.157L9.0003 17V13.657L8.9933 13.459C8.95051 12.808 8.69668 12.1887 8.2703 11.695L8.1213 11.535L8.0003 11.415V17.585L8.0083 17.777C8.05382 18.3493 8.3018 18.8866 8.70774 19.2926C9.11368 19.6985 9.65101 19.9465 10.2233 19.992L10.4143 20H13.5863L13.7773 19.992C14.3496 19.9465 14.8869 19.6985 15.2929 19.2926C15.6988 18.8866 15.9468 18.3493 15.9923 17.777L16.0003 17.586V11.414ZM12.0003 8C11.4463 8 10.7163 8.192 9.8723 8.547C9.58763 8.66767 9.3013 8.80033 9.0133 8.945L8.5833 9.168L9.5363 10.121C10.4091 10.9941 10.9281 12.1592 10.9933 13.392L11.0003 13.657V17H13.0003V13.657C13.0001 12.4223 13.4567 11.2311 14.2823 10.313L14.4643 10.121L15.4173 9.168C14.9974 8.94059 14.5669 8.73335 14.1273 8.547C13.2853 8.192 12.5553 8 12.0003 8ZM12.0003 4C10.7033 4 9.6103 4.44 8.8353 4.89C8.3233 5.185 8.0003 5.823 8.0003 6.656V7.216C8.3613 7.031 8.7293 6.857 9.0963 6.702C10.0343 6.308 11.0543 6 12.0003 6C12.9463 6 13.9663 6.308 14.9043 6.703C15.2713 6.858 15.6393 7.032 16.0003 7.216V6.656C16.0003 5.824 15.6773 5.186 15.1653 4.889C14.3903 4.44 13.2973 4 12.0003 4Z"
                                fill="#1E1E1E" />
                        </svg>
                    </div>
                    <p>{{ $settings['car.status'] }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-check">
                    @foreach ($statuses as $status)
                        <div class="filter-check-item @if (request()->status && in_array($status->id, request()->status)) checked @endif">
                            <div class="icon">
                                <img src="{{ asset($status->icon) }}" alt="">
                            </div>
                            <p>{{ $status->title }}</p>

                            <input type="checkbox" value="{{ $status->id }}" name="status[]"
                                @checked(request()->status and in_array($status->id, request()->status))>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="filter-item @if (request()->min_price or request()->max_price) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"
                                fill="#1E1E1E" />
                            <path
                                d="M17.526 5.11618L14.347 0.65918L2.658 9.99718L2.01 9.99018V10.0002H1.5V22.0002H22.5V10.0002H21.538L19.624 4.40118L17.526 5.11618ZM19.425 10.0002H9.397L16.866 7.45418L18.388 6.96718L19.425 10.0002ZM15.55 5.79018L7.84 8.41818L13.946 3.54018L15.55 5.79018ZM3.5 18.1692V13.8292C3.92218 13.6802 4.30565 13.4386 4.62231 13.1221C4.93896 12.8056 5.18077 12.4223 5.33 12.0002H18.67C18.8191 12.4225 19.0609 12.806 19.3775 13.1227C19.6942 13.4393 20.0777 13.6811 20.5 13.8302V18.1702C20.0777 18.3193 19.6942 18.561 19.3775 18.8777C19.0609 19.1944 18.8191 19.5779 18.67 20.0002H5.332C5.18218 19.5779 4.93996 19.1943 4.62302 18.8775C4.30607 18.5608 3.9224 18.3188 3.5 18.1692Z"
                                fill="#1E1E1E" />
                        </svg>
                    </div>
                    <p>{{ $settings['price'] }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-price">
                    <input type="text" placeholder="Min" name="min_price" value="{{ request()->min_price }}">
                    <input type="text" placeholder="Max" name="max_price" value="{{ request()->max_price }}">
                    <select name="" id="" class="nice-select">
                        <option value="">AZN</option>
                        <option value="">USD</option>
                        <option value="">EURO</option>
                    </select>
                </div>
            </div>
            <div class="filter-item @if (request()->battery_min or request()->battery_max) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 15C5.73478 15 5.48043 14.8946 5.29289 14.7071C5.10536 14.5196 5 14.2652 5 14V10C5 9.73478 5.10536 9.48043 5.29289 9.29289C5.48043 9.10536 5.73478 9 6 9H12V15H6Z"
                                fill="#1E1E1E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 6H5C4.20435 6 3.44129 6.31607 2.87868 6.87868C2.31607 7.44129 2 8.20435 2 9V15C2 15.7956 2.31607 16.5587 2.87868 17.1213C3.44129 17.6839 4.20435 18 5 18H18C18.7956 18 19.5587 17.6839 20.1213 17.1213C20.6839 16.5587 21 15.7956 21 15C21.2652 15 21.5196 14.8946 21.7071 14.7071C21.8946 14.5196 22 14.2652 22 14V10C22 9.73478 21.8946 9.48043 21.7071 9.29289C21.5196 9.10536 21.2652 9 21 9C21 8.20435 20.6839 7.44129 20.1213 6.87868C19.5587 6.31607 18.7956 6 18 6ZM18 8H5C4.73478 8 4.48043 8.10536 4.29289 8.29289C4.10536 8.48043 4 8.73478 4 9V15C4 15.2652 4.10536 15.5196 4.29289 15.7071C4.48043 15.8946 4.73478 16 5 16H18C18.2652 16 18.5196 15.8946 18.7071 15.7071C18.8946 15.5196 19 15.2652 19 15V9C19 8.73478 18.8946 8.48043 18.7071 8.29289C18.5196 8.10536 18.2652 8 18 8Z"
                                fill="#1E1E1E" />
                        </svg>
                    </div>
                    <p>{{ $settings['battery'] }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-inputs">
                    <div class="filter-input">
                        <input type="text" placeholder="Min" name="battery_min"
                            value="{{ request()->battery_min }}">
                        <p>kWh</p>
                    </div>
                    <div class="filter-input">
                        <input type="text" placeholder="Max" name="battery_max"
                            value="{{ request()->battery_max }}">
                        <p>kWh</p>
                    </div>
                </div>
            </div>
            <div class="filter-item @if (request()->horse_min or request()->horse_max) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.22592 11.3299L12.2239 2.3469C12.7709 1.6439 13.7969 2.0809 13.7969 3.0169V9.96991C13.7969 10.5299 14.1989 10.9849 14.6959 10.9849H18.0999C18.8729 10.9849 19.2849 12.0149 18.7739 12.6709L11.7759 21.6539C11.2289 22.3559 10.2029 21.9189 10.2029 20.9829V14.0299C10.2029 13.4699 9.79992 13.0149 9.30392 13.0149H5.89992C5.12692 13.0149 4.71492 11.9859 5.22592 11.3299Z"
                                stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <p>{{ $settings['horse.power'] ?? 'Horse Power' }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-inputs">
                    <div class="filter-input">
                        <input type="text" placeholder="Min" name="horse_min"
                            value="{{ request()->horse_min }}">
                        <p>HP</p>
                    </div>
                    <div class="filter-input">
                        <input type="text" placeholder="Max" name="horse_max"
                            value="{{ request()->horse_max }}">
                        <p>HP</p>
                    </div>
                </div>
            </div>
            <div class="filter-item @if (request()->acceleration_min or request()->acceleration_max) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.3792 8.57012L19.1492 10.4201C19.7424 11.6032 20.0328 12.915 19.9944 14.2378C19.956 15.5607 19.59 16.8534 18.9292 18.0001H5.0692C4.21036 16.5102 3.85449 14.7832 4.05434 13.0752C4.25418 11.3671 4.99911 9.76895 6.17867 8.51755C7.35824 7.26615 8.90966 6.42816 10.6029 6.12782C12.2962 5.82747 14.0412 6.08076 15.5792 6.85012L17.4292 5.62012C15.5457 4.41234 13.3115 3.87113 11.0841 4.08306C8.85665 4.29499 6.76464 5.24782 5.14269 6.78913C3.52074 8.33045 2.46256 10.3712 2.13741 12.5849C1.81227 14.7987 2.23895 17.0575 3.3492 19.0001C3.52371 19.3024 3.77428 19.5537 4.07603 19.7292C4.37777 19.9046 4.72017 19.998 5.0692 20.0001H18.9192C19.2716 20.0015 19.6181 19.9098 19.9237 19.7342C20.2293 19.5586 20.483 19.3053 20.6592 19.0001C21.5806 17.404 22.043 15.5844 21.9953 13.7421C21.9477 11.8998 21.3918 10.1064 20.3892 8.56012L20.3792 8.57012Z"
                                fill="#1E1E1E" />
                            <path
                                d="M10.5905 15.4099C10.7762 15.5959 10.9968 15.7434 11.2396 15.844C11.4824 15.9447 11.7426 15.9965 12.0055 15.9965C12.2683 15.9965 12.5286 15.9447 12.7714 15.844C13.0142 15.7434 13.2347 15.5959 13.4205 15.4099L19.0805 6.91992L10.5905 12.5799C10.4045 12.7657 10.257 12.9862 10.1564 13.229C10.0557 13.4718 10.0039 13.7321 10.0039 13.9949C10.0039 14.2578 10.0557 14.518 10.1564 14.7608C10.257 15.0036 10.4045 15.2242 10.5905 15.4099Z"
                                fill="#1E1E1E" />
                        </svg>
                    </div>
                    <p>{{ $settings['acceleration'] ?? 'Acceleration' }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-inputs">
                    <div class="filter-input">
                        <input type="text" placeholder="Min" name="acceleration_min"
                            value="{{ request()->acceleration_min }}">
                        <p>km/h</p>
                    </div>
                    <div class="filter-input">
                        <input type="text" placeholder="Max" name="acceleration_max"
                            value="{{ request()->acceleration_max }}">
                        <p>km/h</p>
                    </div>
                </div>
            </div>
            <div class="filter-item @if (request()->mileage_number_min or request()->mileage_number_max) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.24325 3.02955C8.50051 3.094 8.72162 3.25801 8.85796 3.48549C8.9943 3.71297 9.03469 3.98529 8.97025 4.24255L4.97025 20.2425C4.94026 20.3719 4.88482 20.4939 4.80716 20.6016C4.7295 20.7093 4.63117 20.8004 4.51792 20.8697C4.40466 20.939 4.27875 20.985 4.14751 21.0051C4.01628 21.0252 3.88236 21.019 3.75356 20.9868C3.62476 20.9546 3.50366 20.8971 3.39733 20.8176C3.29099 20.7381 3.20155 20.6382 3.13422 20.5238C3.06689 20.4094 3.02303 20.2827 3.00517 20.1511C2.98732 20.0196 2.99585 19.8858 3.03025 19.7575L7.03025 3.75755C7.06206 3.63008 7.11867 3.51012 7.19685 3.40454C7.27503 3.29896 7.37326 3.20982 7.4859 3.14221C7.59855 3.0746 7.72342 3.02985 7.85337 3.01052C7.98332 2.99119 8.1158 2.99766 8.24325 3.02955ZM16.9703 3.75655L20.9702 19.7565C21.0047 19.8848 21.0132 20.0186 20.9953 20.1501C20.9775 20.2817 20.9336 20.4084 20.8663 20.5228C20.7989 20.6372 20.7095 20.7371 20.6032 20.8166C20.4968 20.8961 20.3757 20.9536 20.2469 20.9858C20.1181 21.018 19.9842 21.0243 19.853 21.0041C19.7218 20.984 19.5958 20.938 19.4826 20.8687C19.3693 20.7994 19.271 20.7083 19.1933 20.6006C19.1157 20.493 19.0602 20.3709 19.0303 20.2416L15.0303 4.24155C14.9958 4.11332 14.9873 3.97952 15.0052 3.84796C15.023 3.71641 15.0669 3.58972 15.1342 3.47529C15.2016 3.36087 15.291 3.26099 15.3973 3.1815C15.5037 3.102 15.6248 3.04448 15.7536 3.01228C15.8824 2.98008 16.0163 2.97385 16.1475 2.99395C16.2787 3.01406 16.4047 3.06009 16.5179 3.12937C16.6312 3.19865 16.7295 3.28979 16.8072 3.39747C16.8848 3.50515 16.9403 3.62722 16.9703 3.75655ZM12.0003 16.9995C12.2452 16.9996 12.4816 17.0895 12.6646 17.2523C12.8477 17.415 12.9646 17.6393 12.9933 17.8825L13.0003 17.9995V19.9995C13 20.2544 12.9024 20.4996 12.7274 20.6849C12.5524 20.8703 12.3133 20.9818 12.0589 20.9967C11.8044 21.0117 11.5539 20.9289 11.3584 20.7653C11.163 20.6017 11.0374 20.3696 11.0073 20.1166L11.0003 19.9995V17.9995C11.0003 17.7343 11.1056 17.48 11.2931 17.2924C11.4807 17.1049 11.735 16.9995 12.0003 16.9995ZM12.0003 9.99955C12.2655 9.99955 12.5198 10.1049 12.7074 10.2924C12.8949 10.48 13.0003 10.7343 13.0003 10.9995V12.9995C13.0003 13.2648 12.8949 13.5191 12.7074 13.7067C12.5198 13.8942 12.2655 13.9995 12.0003 13.9995C11.735 13.9995 11.4807 13.8942 11.2931 13.7067C11.1056 13.5191 11.0003 13.2648 11.0003 12.9995V10.9995C11.0003 10.7343 11.1056 10.48 11.2931 10.2924C11.4807 10.1049 11.735 9.99955 12.0003 9.99955ZM12.0003 2.99955C12.2452 2.99958 12.4816 3.08951 12.6646 3.25226C12.8477 3.41502 12.9646 3.6393 12.9933 3.88255L13.0003 3.99955V5.99955C13 6.25443 12.9024 6.49958 12.7274 6.68492C12.5524 6.87025 12.3133 6.98178 12.0589 6.99672C11.8044 7.01166 11.5539 6.92887 11.3584 6.76528C11.163 6.60169 11.0374 6.36965 11.0073 6.11655L11.0003 5.99955V3.99955C11.0003 3.73433 11.1056 3.47998 11.2931 3.29244C11.4807 3.10491 11.735 2.99955 12.0003 2.99955Z"
                                fill="#1E1E1E" />
                        </svg>
                    </div>
                    <p>{{ $settings['max.mileage'] ?? 'Mileage' }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-inputs">
                    <div class="filter-input">
                        <input type="text" name="mileage_number_min" placeholder="Min"
                            value="{{ request()->mileage_number_min }}">
                        <p>km</p>
                    </div>
                    <div class="filter-input">
                        <input type="text" name="mileage_number_max" placeholder="Max"
                            value="{{ request()->mileage_number_max }}">
                        <p>km</p>
                    </div>
                </div>
            </div>
            <div class="filter-item @if (request()->expenses_min or request()->expenses_max) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 7H6" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M2 17.714V6.286C2 5.023 2.995 4 4.222 4H19.778C21.005 4 22 5.023 22 6.286V17.714C22 18.977 21.005 20 19.778 20H4.222C2.995 20 2 18.977 2 17.714Z"
                                stroke="#1E1E1E" stroke-width="1.5" />
                            <path d="M11.667 9L10 12H14L12.333 15" stroke="#1E1E1E" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <p>{{ $settings['expenses'] ?? 'Fuel Efficiency' }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-inputs">
                    <div class="filter-input">
                        <input type="text" name="expenses_min" placeholder="Min"
                            value="{{ request()->expenses_min }}">
                        <p>km/L</p>
                    </div>
                    <div class="filter-input">
                        <input type="text" name="expenses_max" placeholder="Max"
                            value="{{ request()->expenses_max }}">
                        <p>km/L</p>
                    </div>
                </div>
            </div>
            <div class="filter-item @if (request()->engine_min or request()->engine_max) active @endif">
                <button class="filter-title" type="button">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 10H16V18H11L9 16H7V11M7 4V6H10V8H7L5 10V13H3V10H1V18H3V15H5V18H8L10 20H18V16H20V19H23V9H20V12H18V8H12V6H15V4H7Z"
                                fill="#1E1E1E" />
                        </svg>
                    </div>
                    <p>{{ $settings['engine'] ?? 'Engine Volume' }}</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="filter-inputs">
                    <div class="filter-input">
                        <input type="text" name="engine_min" placeholder="Min"
                            value="{{ request()->engine_min }}">
                        <p>L</p>
                    </div>
                    <div class="filter-input">
                        <input type="text" name="engine_max" placeholder="Max"
                            value="{{ request()->engine_max }}">
                        <p>L</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="submitFilter" type="submit">
            {{ $settings['apply'] }}
        </button>
    </form>
</div>
