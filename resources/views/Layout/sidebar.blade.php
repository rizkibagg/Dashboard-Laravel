    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ ($title === "Dashboard") ? 'active' : 'collapsed' }}" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ ($title === "Data Dosen") ? 'active' : 'collapsed' }}" href="{{ route('datads') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Dosen</span>
                </a>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link {{ ($title === "Data Mahasiswa") ? 'active' : 'collapsed' }}" href="{{ route('data') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Mahasiswa</span>
                </a>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link {{ ($title === "About") ? 'active' : 'collapsed' }}" href="/about">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->
