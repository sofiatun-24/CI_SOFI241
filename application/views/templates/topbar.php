<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Mobile) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User Info Dropdown -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <!-- Nama & Role -->
                <div class="d-none d-lg-flex align-items-center mr-2" style="text-align:right;">
                    <div>
                        <span class="text-gray-800 small font-weight-bold">
                            <?= $this->session->userdata('nama') ?>
                        </span>
                        <br>
                        <span style="font-size:11px; color:#e97fa8; font-weight:600;">
                            <?= ucfirst($this->session->userdata('role')) ?>
                        </span>
                    </div>
                </div>

                <!-- Avatar pink pastel -->
                <div style="width:38px; height:38px; border-radius:50%;
                            background: linear-gradient(135deg, #e97fa8, #d4608e);
                            display:flex; align-items:center; justify-content:center;
                            color:#fff; font-weight:700; font-size:14px; flex-shrink:0;">
                    <?= strtoupper(substr($this->session->userdata('nama'), 0, 1)) ?>
                </div>

            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown" style="min-width:220px; border:none; border-radius:12px;">

                <!-- Header Dropdown -->
                <div class="px-3 py-2" style="background:#fdf0f6; border-radius:12px 12px 0 0;">
                    <div class="font-weight-bold text-dark" style="font-size:13px;">
                        <?= $this->session->userdata('nama') ?>
                    </div>
                    <div class="text-muted" style="font-size:11px;">
                        <?= $this->session->userdata('username') ?>
                        &bull;
                        <span style="color:#e97fa8; font-weight:600;">
                            <?= ucfirst($this->session->userdata('role')) ?>
                        </span>
                    </div>
                </div>

                <div class="dropdown-divider m-0"></div>

                <a class="dropdown-item py-2" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2" style="color:#3dbb85;"></i>
                    Profil Saya
                </a>

                <div class="dropdown-divider"></div>

                <div class="dropdown-item text-muted py-1" style="font-size:11px; cursor:default;">
                    <i class="fas fa-clock fa-sm mr-1" style="color:#3dbb85;"></i>
                    Login: <?= date('d M Y, H:i') ?>
                </div>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item py-2" href="<?= site_url('auth/logout') ?>"
                   onclick="return confirm('Yakin ingin logout?')"
                   style="color:#e97fa8; font-weight:600;">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    Logout
                </a>

            </div>
        </li>

    </ul>
</nav>