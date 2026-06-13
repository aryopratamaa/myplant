<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="text-nowrap logo-img">
                <img src="{{ asset('seodash/src/assets/images/logos/logo-light.svg') }}" alt="Logo" />
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
                    <a class="sidebar-link" href="/kategori" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/tanaman" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Tanaman</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/event" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Event</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/laporan" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>

            </ul>

        </nav>
    </div>
</aside>