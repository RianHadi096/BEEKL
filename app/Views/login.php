<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BEEKL • Login</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.cs');?>">
    <link rel="stylesheet" href="<?= base_url('css/Google-Style-Login--1.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/Google-Style-Login-.css');?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<header class="m-2">
    <div class="container header-container d-flex justify-content-between align-items-center">
        
        <div class="header-logo">LOGO</div>
        <!-- Bagian Kanan Header -->
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-secondary rounded-pill me-3">
            Try BEEKL+
            </button>
            
            
            <div class="dropdown ms-3">
            <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                English
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">English</a></li>
                <li><a class="dropdown-item" href="#">Other Language</a></li>
            </ul>
            </div>
        </div>
        </div>
    </header>
    <main>
    <div style="margin: auto;width: auto;height: auto;font-family: Roboto, sans-serif;">
        <div class="row">
            <div class="col" style="background: radial-gradient(50% 123.47% at 50% 50%, #ffc700 0%, #720059 100%), linear-gradient(121.28deg, #669600 0%, #ff4d00 100%), linear-gradient(360deg, #ff6b00 0%, #8fff00 100%), radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%), radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #6a845a 100%);background-blend-mode: screen, color-dodge, overlay, difference, normal;padding: 50px;margin-bottom: 2px;padding-bottom: 160px;">
                <div class="login-card"><img class="profile-img-card" src="<?= base_url('img/avatar_2x.png');?>">
                    <p class="profile-name-card"> </p>
                    <p style="text-align: center;">Login untuk akses Beekl</p>
                    <form class="form-signin" style="padding-bottom: 52px;margin-bottom: -34px;" action="/login/auth" method="post">
                        <span class="reauth-email"> </span>
                        <input class="form-control" type="email" name="login_email" id="InputForEmail" required="" placeholder="Email address" autofocus="" value="">
                        <input class="form-control" type="password" name="login_password" id="InputForPassword" required="" placeholder="Password">
                        <div class="checkbox" style="margin-bottom: 10px;">
                            <label>
                                <input type="checkbox" value="remember-me">Ingat saya
                            </label>
                        </div>
                        <button class="btn btn-primary btn-lg d-block btn-signin w-100" type="submit" 
                            style="
                            margin-bottom: 10px;
                            background-color: #ff4d00;">
                            Masuk</button>
                        <div style="margin-bottom: 30px;">
                            <a class="forgot-password" href="#">Lupa Password.</a>
                        </div>
                        <div style="margin-bottom: 0px;">
                            <a class="forgot-password" href="/register">Belum punya akun BEEKL? Daftar Disini.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    </main>
    
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  ></script>
</html>