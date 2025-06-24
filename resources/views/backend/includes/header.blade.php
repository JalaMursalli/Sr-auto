<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/{{app()->getLocale()}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('backend/assets/images/logo-sr-auto 1.png') }}" alt="logo-sm" height="60">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('backend/assets/images/logo-sr-auto 1.png') }}" alt="logo-dark" height="55">
                    </span>
                </a>

                <a href="/{{app()->getLocale()}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('backend/assets/images/logo-sr-auto 1.png') }}" alt="logo-sm-light" height="60">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('backend/assets/images/logo-sr-auto 1.png') }}" alt="logo-light" height="55">
                    </span>
                </a>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="header-profile-user" width="70" height="70" src="https://mercedes.avtoicare.az/back/assets/images/logo.webp"
                        alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ms-1">Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="ri-user-line align-middle me-1"></i> Profil</a>
                    <div class="dropdown-divider" ></div>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger" style="background: none; border: none;">
                                <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout
                            </button>
                        </form>
                     </div>

        </div>
    </div>
</header>
