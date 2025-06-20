<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BEEKL+ Pricing & Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/beeklplus.css') ?>">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #1a1a1a !important;
            color: #e0e0e0 !important;
        }

        .pricing-card {
            max-width: 500px;
            padding: 40px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        body.dark-mode .pricing-card {
            background: #2d2d2d;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        body.dark-mode .pricing-subtitle {
            color: #adb5bd;
        }

        body.dark-mode .price span {
            color: #adb5bd !important;
        }

        body.dark-mode .features-list li {
            color: #e0e0e0;
        }

        body.dark-mode .payment-methods {
            background: #404040;
        }

        body.dark-mode .payment-methods i {
            color: #adb5bd;
        }

        body.dark-mode .back-link {
            color: #adb5bd;
        }

        body.dark-mode .back-link:hover {
            color: #e0e0e0;
        }
        .pricing-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #007bff, #6610f2);
        }
        .pricing-title {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #007bff, #6610f2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .pricing-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
        }
        .price {
            font-size: 2rem;
            font-weight: 700;
            margin: 30px 0;
            color: #007bff;
        }
        .features-list {
            text-align: left;
            margin: 30px 0;
            padding-left: 0;
            list-style: none;
        }
        .features-list li {
            margin-bottom: 15px;
            font-size: 1.1rem;
            padding-left: 30px;
            position: relative;
        }
        .features-list li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
        }
        .btn-subscribe {
            font-size: 1.2rem;
            padding: 15px 40px;
            border-radius: 50px;
            background: linear-gradient(90deg, #007bff, #6610f2);
            border: none;
            transition: transform 0.3s ease;
            margin: 20px 0;
        }
        .btn-subscribe:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .payment-methods {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        .payment-methods i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #6c757d;
        }
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1100;
        }
        .back-link {
            color: #6c757d;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: #007bff;
        }
    </style>
</head>
<body class="<?= isset($user['dark_mode']) && $user['dark_mode'] ? 'dark-mode' : '' ?>" data-user='<?= json_encode($user ?? []) ?>'>

<div class="position-fixed top-0 end-0 p-3" style="z-index:1500;">
  <button id="toggleMode" class="btn btn-sm btn-outline-secondary">
    <i class="fa fa-moon"></i>
  </button>
</div>

    <div class="pricing-card">
        <h1 class="pricing-title">BEEKL+</h1>
        <p class="pricing-subtitle">Unlock Premium Features & Enhance Your Experience</p>
        
        <div class="price">Rp 9.999 <span style="font-size: 1rem; color: #666">/month</span></div>

        <ul class="features-list">
            <li>Dark Mode for Comfortable Viewing</li>
            <li>Exclusive Avatar Frames (Gold, Diamond, Rainbow)</li>
            <li>Priority Support Access</li>
            <li>Ad-Free Experience</li>
            <li>Early Access to New Features</li>
        </ul>

        <form id="subscribeForm" action="/beeklplus/upgrade" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-subscribe">
                Get BEEKL+ Now
            </button>
        </form>

        <div class="payment-methods">
            <p class="mb-2">Supported Payment Methods</p>
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-mastercard"></i>
            <i class="fas fa-university"></i>
            <i class="fas fa-wallet"></i>
        </div>

        <a href="/profile/<?= session()->get('id') ?>" class="back-link">
            <i class="fas fa-arrow-left me-2"></i>Back to Profile
        </a>
    </div>

    <div class="toast-container">
        <div id="subscribeToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>Welcome to BEEKL+! Enjoy your premium features.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('subscribeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const button = this.querySelector('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Processing...';
            button.disabled = true;

            fetch(this.action, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: ''
            }).then(response => {
                if (response.ok) {
                    var toastEl = document.getElementById('subscribeToast');
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                    setTimeout(() => {
                        window.location.href = '/profile/<?= session()->get('id') ?>';
                    }, 2000);
                } else {
                    throw new Error('Subscription failed');
                }
            }).catch(() => {
                alert('Subscription failed. Please try again.');
                button.innerHTML = originalText;
                button.disabled = false;
            });
        });
    </script>
    <script>
  // Tunggu sampai elemen sudah ter-render
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('toggleMode');
    const body = document.body;

    btn.addEventListener('click', () => {
      // Toggle class
      body.classList.toggle('dark-mode');

      // Ganti ikon moon/sun
      const icon = btn.querySelector('i');
      if (body.classList.contains('dark-mode')) {
        icon.className = 'fa fa-sun';
      } else {
        icon.className = 'fa fa-moon';
      }

      // (Opsional) Simpan preference ke server via AJAX
      fetch('/beeklplus/set-theme', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Content-Type': 'application/json',
          '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
        },
        body: JSON.stringify({ dark_mode: body.classList.contains('dark-mode') })
      });
    });
  });
</script>

</body>
</html>
