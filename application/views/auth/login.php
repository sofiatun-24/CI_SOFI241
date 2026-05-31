<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - PT Maju Jaya</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #3dbb85 0%, #2a9e6e 50%, #e97fa8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        /* Logo area */
        .login-brand {
            text-align: center;
            margin-bottom: 28px;
        }
        .brand-icon {
            width: 64px; height: 64px;
            border-radius: 18px;
            background: rgba(255,255,255,.25);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,.3);
        }
        .brand-icon i {
            font-size: 28px;
            color: #fff;
        }
        .brand-name {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 2px;
        }
        .brand-sub {
            color: rgba(255,255,255,.8);
            font-size: 13px;
        }

        /* Card */
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,.15);
            overflow: hidden;
        }
        .login-card .card-body {
            padding: 36px 32px;
        }

        /* Card header strip */
        .card-header-strip {
            height: 5px;
            background: linear-gradient(90deg, #3dbb85, #e97fa8);
        }

        .login-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 6px;
        }
        .login-sub {
            font-size: 13px;
            color: #718096;
            margin-bottom: 28px;
        }

        /* Form */
        label {
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 6px;
        }
        .input-group-text {
            background: #f0faf6;
            border: 1.5px solid #e2e8f0;
            border-right: none;
            color: #3dbb85;
            border-radius: 10px 0 0 10px;
        }
        .form-control {
            border: 1.5px solid #e2e8f0;
            border-left: none;
            border-radius: 0 10px 10px 0;
            padding: 10px 14px;
            font-size: 14px;
            transition: .2s;
        }
        .form-control:focus {
            border-color: #3dbb85;
            box-shadow: 0 0 0 3px rgba(61,187,133,.15);
        }
        .input-group:focus-within .input-group-text {
            border-color: #3dbb85;
        }

        /* Toggle password */
        .btn-toggle-pw {
            border: 1.5px solid #e2e8f0;
            border-left: none;
            background: #f0faf6;
            color: #3dbb85;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            padding: 0 14px;
        }
        .btn-toggle-pw:hover { background: #e8f8f2; }

        /* Submit button */
        .btn-login {
            background: linear-gradient(135deg, #3dbb85, #2a9e6e);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            width: 100%;
            margin-top: 8px;
            transition: .2s;
            letter-spacing: .3px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #2a9e6e, #1f7d55);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(61,187,133,.35);
        }

        /* Alert */
        .alert-danger {
            border: none;
            border-radius: 10px;
            background: #fce8f1;
            color: #d4608e;
            font-size: 13px;
            border-left: 4px solid #e97fa8;
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 20px;
            color: rgba(255,255,255,.75);
            font-size: 12px;
        }

        /* Role info */
        .role-info {
            background: #f7faf9;
            border-radius: 10px;
            padding: 12px 14px;
            margin-top: 20px;
            font-size: 12px;
            color: #718096;
        }
        .role-info .role-item {
            display: flex;
            justify-content: space-between;
            padding: 3px 0;
        }
        .role-badge {
            background: #e8f8f2;
            color: #2a9e6e;
            border-radius: 99px;
            padding: 1px 10px;
            font-weight: 600;
            font-size: 11px;
        }
        .role-badge.pink {
            background: #fce8f1;
            color: #d4608e;
        }
        .role-badge.mint {
            background: #e0f7ef;
            color: #4dac87;
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    <!-- BRAND -->
    <div class="login-brand">
        <div class="brand-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="brand-name">PT Maju Jaya</div>
        <div class="brand-sub">Sales Order System</div>
    </div>

    <!-- CARD -->
    <div class="card login-card">
        <div class="card-header-strip"></div>
        <div class="card-body">

            <div class="login-title">Selamat Datang 👋</div>
            <div class="login-sub">Silakan login untuk melanjutkan</div>

            <!-- ALERT ERROR -->
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger mb-3">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <!-- FORM -->
            <!-- autocomplete="off" mencegah browser isi otomatis -->
            <form action="<?= base_url('auth/proses_login') ?>" method="POST" autocomplete="off">

                <!-- Input tersembunyi sebagai honeypot untuk cegah autofill -->
                <input type="text"     name="fakeuser" style="display:none;" tabindex="-1">
                <input type="password" name="fakepass" style="display:none;" tabindex="-1">

                <div class="form-group mb-3">
                    <label><i class="fas fa-user mr-1" style="color:#3dbb85;"></i> Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Masukkan username"
                               autocomplete="new-password"
                               required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label><i class="fas fa-lock mr-1" style="color:#3dbb85;"></i> Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password"
                               name="password"
                               id="inputPassword"
                               class="form-control"
                               placeholder="Masukkan password"
                               autocomplete="new-password"
                               required>
                        <div class="input-group-append">
                            <button type="button" class="btn-toggle-pw" onclick="togglePassword()">
                                <i class="fas fa-eye" id="iconEye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </button>

            </form>

            <!-- ROLE INFO -->
            <div class="role-info">
                <div style="font-weight:600; color:#4a5568; margin-bottom:6px; font-size:11px;">
                    <i class="fas fa-info-circle mr-1" style="color:#3dbb85;"></i> Hak Akses Role:
                </div>
                <div class="role-item">
                    <span>Admin</span>
                    <span class="role-badge">Semua fitur</span>
                </div>
                <div class="role-item">
                    <span>Sales</span>
                    <span class="role-badge mint">Sales Order</span>
                </div>
                <div class="role-item">
                    <span>Manager</span>
                    <span class="role-badge pink">Laporan</span>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="login-footer">
        &copy; <?= date('Y') ?> PT Maju Jaya &mdash; Sales Order System
    </div>

</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
    function togglePassword() {
        const input = document.getElementById('inputPassword');
        const icon  = document.getElementById('iconEye');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'fas fa-eye';
        }
    }
</script>
</body>
</html>