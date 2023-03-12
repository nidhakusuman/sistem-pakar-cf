<!-- Sidebar Nav -->
<aside id="sidebar" class="js-custom-scroll side-nav">
    <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
        <!-- Title -->
        <li class="sidebar-heading h6">Master</li>
        <!-- End Title -->

        <!-- Dashboard -->
        <li class="side-nav-menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : ''}}">
            <a class="side-nav-menu-link media align-items-center" href="/">
          <span class="side-nav-menu-icon d-flex mr-3">
            <i class="gd-dashboard"></i>
          </span>
                <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard -->

        <!-- Documentation -->
        <li class="side-nav-menu-item {{ Request::segment(1) == 'basis-pengetahuan' ? 'active' : ''}}">
            <a class="side-nav-menu-link media align-items-center" href="{{ route('basis-pengetahuan.index') }}" >
          <span class="side-nav-menu-icon d-flex mr-3">
            <i class="gd-agenda"></i>
          </span>
                <span class="side-nav-fadeout-on-closed media-body">Basis Pengetahuan</span>
            </a>
        </li>
        <!-- End Documentation -->
        <!-- Documentation -->
        <li class="side-nav-menu-item {{ Request::segment(1) == 'gejala-penyakit' ? 'active' : ''}}">
            <a class="side-nav-menu-link media align-items-center" href="{{ route('gejala-penyakit.index') }}" >
          <span class="side-nav-menu-icon d-flex mr-3">
            <i class="gd-clipboard"></i>
          </span>
                <span class="side-nav-fadeout-on-closed media-body">Gejala Penyakit</span>
            </a>
        </li>
        <!-- End Documentation -->
        <!-- Documentation -->
        <!-- End Documentation -->

        <!-- Title -->
        <li class="sidebar-heading h6">Data</li>
        <!-- End Title -->
        <!-- Documentation -->
        <li class="side-nav-menu-item {{ Request::segment(1) == 'data-pasien' ? 'active' : ''}}"">
            <a class="side-nav-menu-link media align-items-center" href="{{ route('data.pasien.index') }}" target="_blank">
          <span class="side-nav-menu-icon d-flex mr-3">
            <i class="gd-user"></i>
          </span>
                <span class="side-nav-fadeout-on-closed media-body">Data Pasien</span>
            </a>
        </li>
        <!-- End Documentation -->


    </ul>
</aside>
<!-- End Sidebar Nav -->
