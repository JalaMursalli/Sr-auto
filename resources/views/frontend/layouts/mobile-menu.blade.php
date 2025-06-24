<div class="mobile_menu_container"> 
    <div class="mobile_menu">
        <div class="mobile_menu_head">
            <a href="/{{app()->getLocale()}}" class="mobile_menu_logo">
                <img class="logoDark" src="./assets/images/logo-dark.svg" alt="">
                <img class="logoWhite" src="./assets/images/logo-white.svg" alt="">
            </a>
            <button class="close_mobile_menu" type="button">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.5 20L4.5 4M20.5 4L4.5 20" stroke="black" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
        <form class="mobile-search" action="{{ route('brend', ['language'=>app()->getLocale()]) }}">
            <button class="searchBtn" type="submit">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.16675 17.4167C11.3548 17.4167 13.4532 16.5475 15.0004 15.0003C16.5476 13.4531 17.4167 11.3547 17.4167 9.16667C17.4167 6.97863 16.5476 4.88021 15.0004 3.33303C13.4532 1.78586 11.3548 0.916664 9.16675 0.916664C6.97871 0.916664 4.88029 1.78586 3.33312 3.33303C1.78594 4.88021 0.916748 6.97863 0.916748 9.16667C0.916748 11.3547 1.78594 13.4531 3.33312 15.0003C4.88029 16.5475 6.97871 17.4167 9.16675 17.4167ZM9.16675 15.4752C8.3383 15.4752 7.51797 15.312 6.75259 14.995C5.98721 14.6779 5.29176 14.2132 4.70596 13.6274C4.12017 13.0416 3.65549 12.3462 3.33845 11.5808C3.02142 10.8154 2.85825 9.99511 2.85825 9.16667C2.85825 8.33822 3.02142 7.51789 3.33845 6.75251C3.65549 5.98712 4.12017 5.29168 4.70596 4.70588C5.29176 4.12008 5.98721 3.6554 6.75259 3.33837C7.51797 3.02134 8.3383 2.85816 9.16675 2.85816C10.8399 2.85816 12.4445 3.52281 13.6275 4.70588C14.8106 5.88895 15.4752 7.49355 15.4752 9.16667C15.4752 10.8398 14.8106 12.4444 13.6275 13.6274C12.4445 14.8105 10.8399 15.4752 9.16675 15.4752ZM14.5714 17.4167L16.7952 21.0833H18.9402L16.7155 17.4167H14.5714Z" fill="#1E1E1E"/>
                    </svg>

            </button>
            <input value="{{request()->query('query')}}" type="text" name="query" placeholder="AVATR,XPENG,SKODA....">
        </form>
        <div class="mobile_menu_bottom">
            <div class="lang">
                <button class="current-lang" type="button">
                    <span>AZ</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10L12 15L17 10H7Z" fill="#414141"/>
                    </svg>
                </button>
                <div class="other-langs">
                    <a href="" class="lang-item">EN</a>
                    <a href="" class="lang-item">RU</a>
                </div>
            </div>
            <div class="line"></div>
            <button class="themeModeBtn" type="button">
                <img src="{{asset('frontend/assets/icons/moon.svg')}}" alt="" class="moon">
                <img src="{{asset('frontend/assets/icons/moon-white.svg')}}" alt="" class="moon-white">
                <img src="{{asset('frontend/assets/icons/sun.svg')}}" alt="" class="sun">
            </button>
            <div class="line"></div>
            <a href="" class="mobile-phone">*{{$logo->phone_title}}</a>
        </div>
    </div>
</div>
