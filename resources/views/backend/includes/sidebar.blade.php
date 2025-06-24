 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        {{-- <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i
                        class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span
                            class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Tənzimləmələr</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.translation.index')}}">Tərcümələr</a></li>
                         <li><a href="{{route('backend.price.index')}}">Qiymət aralığı</a></li>
                         <li><a href="{{route('backend.status.index')}}">Status</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>SEO</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.home-seo.index')}}">Ana səhifə</a></li>
                         <li><a href="{{route('backend.contact-seo.index')}}">Əlaqə</a></li>
                         <li><a href="{{route('backend.success-seo.index')}}">Success</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('backend.home.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Ana səhifə</span>
                </a></li>
                <li>
                    <a href="{{route('backend.brend.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Brendlər</span>
                </a></li>
                <li>
                    <a href="{{route('backend.fuel.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Yanacaq</span>
                </a></li>
                <li>
                    <a href="{{route('backend.model.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Modellər</span>
                </a></li>
                <li>
                    <a href="{{route('backend.product.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Məhsullar</span>
                </a>
            </li>


             <li>
                    <a href="{{route('backend.feature-groups.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Xüsusiyyət qrupları</span>
                </a>
            </li>

                <li>
                    <a href="{{route('backend.banner.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Banner</span>
                </a></li>
                <li>
                    <a href="{{route('backend.test-drive.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Test Drive</span>
                </a></li>
                <li>
                    <a href="{{route('backend.success.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Success Page</span>
                </a></li>
                        <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Bizimlə Əlaqə</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.contact-info.index')}}">Info</a></li>
                          <li><a href="{{route('backend.contact-apply.index')}}">Müraciətlər</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Social Media </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                         <li><a href="{{route('backend.social.index')}}">Footer</a></li>
                         <li><a href="{{route('backend.share.index')}}">Social Share</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('backend.logo.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Logo</span>
                </a></li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
