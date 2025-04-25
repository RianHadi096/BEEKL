<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Beekl Login</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.cs');?>">
    <link rel="stylesheet" href="<?= base_url('css/Google-Style-Login--1.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/Google-Style-Login-.css');?>">
</head>

<body style="margin: auto;width: auto;height: auto;font-family: Roboto, sans-serif;">
    <div class="row">
        <div class="col" style="background: radial-gradient(50% 123.47% at 50% 50%, #ffc700 0%, #720059 100%), linear-gradient(121.28deg, #669600 0%, #ff4d00 100%), linear-gradient(360deg, #ff6b00 0%, #8fff00 100%), radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%), radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #6a845a 100%);background-blend-mode: screen, color-dodge, overlay, difference, normal;padding: 50px;margin-bottom: 2px;padding-bottom: 160px;">
            <div class="login-card"><img class="profile-img-card" src="<?= base_url('img/avatar_2x.png');?>">
                <p class="profile-name-card"> </p>
                <p style="text-align: center;">Login untuk akses Beekl</p>
                <form class="form-signin" style="padding-bottom: 52px;margin-bottom: -34px;" action="/login/auth" method="post">
                    <span class="reauth-email"> </span>
                    <input class="form-control" type="email" name="login_email" id="InputForEmail" required="" placeholder="Email address" autofocus="" value="<?= set_value('login_email')?>">
                    <input class="form-control" type="password" name="login_password" id="InputForPassword" required="" placeholder="Password">
                    <div class="checkbox" style="margin-bottom: 10px;">
                        <label>
                            <input type="checkbox" value="remember-me">Ingat saya
                        </label>
                    </div>
                    <button class="btn btn-primary btn-lg d-block w-100" type="submit" style="margin-bottom: 10px;">Masuk</button>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>