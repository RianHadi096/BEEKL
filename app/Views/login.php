<!DOCTYPE html>
<html lang="en" data-bs-theme="<?= session()->get('theme') ?? 'light'; ?>">


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

<style>
  html[data-bs-theme="dark"] body {
    background-color: #121212 !important;
    color: #f5f5f5;
  }
  html[data-bs-theme="dark"] .card {
    background-color: #1e1e1e;
  }
  html[data-bs-theme="dark"] .form-control {
    background-color: #2c2c2c;
    color: #f5f5f5;
    border-color: #444;
  }
  html[data-bs-theme="dark"] .btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
  }

  /* +=+++ Override tambahan untuk paragraf login ++++ */
  html[data-bs-theme="dark"] .login-card p,
  html[data-bs-theme="dark"] .login-card .profile-name-card {
    color: #f5f5f5 !important;
  }
  /* Ganti background dan teks login-card */
    html[data-bs-theme="dark"] .login-card {
        background-color: #1e1e1e !important;
        border-color: #444 !important;
    }
    /* Pastikan paragraf di dalam login-card tetap putih */
    html[data-bs-theme="dark"] .login-card p,
    html[data-bs-theme="dark"] .login-card .profile-name-card {
        color: #f5f5f5 !important;
    }
    /* Override input form-signin */
    html[data-bs-theme="dark"] .form-signin .form-control {
        background-color: #2c2c2c !important;
        color: #f5f5f5;
        border-color: #555;
    }
    /* Override tombol Log In */
    html[data-bs-theme="dark"] .form-signin .btn-primary {
        background-color: #ff4d00 !important;
        border-color: #ff4d00 !important;
    color: #fff;
    }
    /* Buat header dan tombol di header ikut dark */
    html[data-bs-theme="dark"] header,
    html[data-bs-theme="dark"] .header-container {
        background-color: #121212 !important;
    }
    html[data-bs-theme="dark"] header .header-logo,
    html[data-bs-theme="dark"] header .dropdown-toggle,
    html[data-bs-theme="dark"] header .btn-outline-secondary {
        color: #f5f5f5 !important;
        border-color: #555 !important;
    }
    /* Dropdown menu */
    html[data-bs-theme="dark"] .dropdown-menu {
        background-color: #2c2c2c !important;
        color: #f5f5f5;
    }
    /* Toggle Icon */
    html[data-bs-theme="dark"] #toggleMode i {
        color: #f5f5f5;
    }
    /* Override tambahan untuk checkbox label */
    html[data-bs-theme="dark"] .checkbox label {
        color: #f5f5f5 !important;
    }

</style>


</head>


<body>

<header class="m-2">
    <div class="container header-container d-flex justify-content-between align-items-center">
        
        <div class="header-logo">
            <a href="/">
                <img
                    src="<?= base_url('beekllogo.png') ?>"
                    alt="BEEKL Logo"
                    style="height:40px; width:auto;"
                />
            </a>
        </div>
            <!-- Bagian Kanan Header -->
            <div class="d-flex align-items-center">
                <div class="dropdown ms-3">
                    <button
                        class="btn btn-outline-secondary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img src="https://flagpedia.net/data/flags/w580/us.webp"
                        alt="Language Icon"
                        class="rounded-circle"
                        width="30"
                        height="30"/> EN
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/#">US English</a></li>
                        <li><a class="dropdown-item" href="/#">Indonesia</a></li>
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
                    <p style="text-align: center;">Do you have a BEEKL? Go sign in.</p>
                    <form class="form-signin" style="padding-bottom: 52px;margin-bottom: -34px;" action="/login/auth" method="post">
                        <?php if(session()->getFlashdata('msg')){
                            echo '<div class="alert alert-danger" role="alert" style="margin-bottom: 5px;">'.session()->getFlashdata('msg').'</div>';
                        }?>
                        <input class="form-control" type="text" name="login_email_username" id="InputForEmailorUsername" required="" placeholder="Username or Email">
                        <input class="form-control" type="password" name="login_password" id="InputForPassword" required="" placeholder="Password">
                        <div class="checkbox" style="margin-bottom: 10px;">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-primary btn-lg d-block btn-signin w-100" type="submit" 
                            style="
                            margin-bottom: 10px;
                            background-color: #ff4d00;">
                            Log In</button>
                        <div style="margin-bottom: 30px;">
                            <a class="forgot-password text-decoration-none text-secondary-emphasis" href="#"># I forgot my Password. </a>
                        </div>
                        <div style="margin-bottom: 0px;">
                            <a class="register text-decoration-none text-secondary-emphasis" href="/register"><center>Register here if you don't have a BEEKL account.</center></a>
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
<!-- DARK MODE TOGGLE SCRIPT -->
<script>
  (function(){
    const btn  = document.getElementById('toggleMode');
    const icon = btn.querySelector('i');
    btn.addEventListener('click', () => {
      const html    = document.documentElement;
      const next    = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-bs-theme', next);
      icon.classList.toggle('fa-moon');
      icon.classList.toggle('fa-sun');
      fetch('<?= base_url('theme/set') ?>', {
        method: 'POST',
        headers: { 'Content-Type':'application/json' },
        body: JSON.stringify({ theme: next })
      });
    });
  })();
</script>

</html>