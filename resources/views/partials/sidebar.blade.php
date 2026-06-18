<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}"
                class="text-nowrap logo-img text-decoration-none d-flex align-items-center gap-2 mt-3 mb-3">
                <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                    style="width: 35px; height: 35px;">
                    <i class="ti ti-leaf fs-6"></i>
                </div>
                <span class="fw-bolder fs-6 text-dark" style="letter-spacing: 0.5px;">KebunKu<span
                        class="text-primary">.</span></span>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/') }}" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">MASTER MENU</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link{{ request()->routeIs('kategori.*') ? ' active' : '' }}" href="/kategori"
                        aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link{{ request()->routeIs('plant.*') ? ' active' : '' }}" href="/plant"
                        aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Plant</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link{{ request()->routeIs('event.*') ? ' active' : '' }}" href="/event"
                        aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone"
                                class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Event</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link{{ request()->routeIs('laporan.*') ? ' active' : '' }}" href="/laporan"
                        aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:document-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>


            </ul>

        </nav>
    </div>
</aside>
