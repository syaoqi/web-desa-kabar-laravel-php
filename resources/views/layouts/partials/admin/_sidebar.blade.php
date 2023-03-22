<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('admin/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level">Admin</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <ul class="nav nav-primary">
                @can('admin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Administrator</h4>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard">
                            <i class="fas fa-home"></i>
                            <span class="sub-item">Dashboard</span>
                        </a>
                    </li>
                      <li class="nav-item">
                        <a data-toggle="collapse" href="#DataPenduduk">
                            <i class="fas fa-archway"></i>
                            <p>Profil Desa</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="DataPenduduk">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="/penduduks">
                                        <span class="sub-item">Profil Wilayah Desa</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/penduduks">
                                        <span class="sub-item">Profil Masyarakat Desa</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/penduduks">
                                        <span class="sub-item">Profil Potensi Desa</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#base">
                            <i class="far fa-address-card"></i>
                            <p>Layanan Mandiri</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="/downloads">
                                        <span class="sub-item">Tambah Format Surat</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/kotaksaran">
                                        <span class="sub-item">Daftar Kotak Saran</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#UserAkun">
                            <i class="fas fa-users"></i>
                            <p>Akun Pengguna</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="UserAkun">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="/accounts">
                                        <span class="sub-item">Daftar Akun Penduduk</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admins">
                                        <span class="sub-item">Daftar Akun Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Users</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#KotakSaran">
                        <i class="fas fa-child"></i>
                        <p>Layanan Mandiri</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="KotakSaran">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/kotaksarans">
                                    <span class="sub-item">Kotak Saran</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
