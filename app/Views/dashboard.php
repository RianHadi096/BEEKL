<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Web Page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      background-color: #f8f9fa; 
    }
    /* Header */
    header {
      position: sticky;
      top: 0;
      z-index: 1020;
      background-color: #fff;
      border-bottom: 1px solid #dee2e6;
    }
    .header-container {
      padding-top: 0.75rem;
      padding-bottom: 0.75rem;
    }
    .header-logo {
      font-weight: 700;
      font-size: 1.25rem;
      margin: 0;
    }

    /* Search Bar*/
    .search-wrapper {
      position: relative;
      width: 50%;
    }
    .search-wrapper .fa-search {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #adb5bd;
    }
    .search-wrapper input {
      padding-left: 2.25rem;
      border-radius: 50px;
    }

    /* Sidebar Kiri */
    aside.col-md-2 .card {
      border: none;
    }
    aside.col-md-2 .card-body {
      padding: 0.5rem;
    }
    aside.col-md-2 .nav-link {
      padding: 0.5rem 0.25rem;
    }

    /* Bagian Tengah */
    .card {
      border: 1px solid #dee2e6;
      border-radius: 8px;
    }
    .card-body img {
      border-radius: 8px;
    }
    .btn-follow {
      border-radius: 50px;
    }

    /* Sidebar Kanan */
    .card-body .btn {
      border-radius: 50px;
    }
    /* Link sidebar kanan (About, Careers, dsb) */
    .card-body .btn-link {
      text-align: left;
      padding-left: 0;
    }

    /* Ikon bottom (like, comment, share) */
    .post-actions i {
      margin-right: 4px;
    }
  </style>
</head>
<body>
  <header>
    <div class="container header-container d-flex justify-content-between align-items-center">
      
      <div class="header-logo">LOGO</div>

      <!-- Search Bar -->
      <div class="search-wrapper">
        <i class="fas fa-search"></i>
        <input
          type="text"
          class="form-control"
          placeholder="Search your thoughts"
        />
      </div>

      <!-- Bagian Kanan Header -->
      <div class="d-flex align-items-center">
        <button class="btn btn-outline-secondary rounded-pill me-3">
          Try BEEKL+
        </button>
        <button
            class="btn btn-outline-secondary dropdown-toggle rounded-pill me-3"
            type="button"
            id="dropdownMenuButton2"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img src="https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg"
            alt="User avatar"
            class="rounded-circle"
            width="40"
            height="40"/>
            <?php
                if(session()->get('name')) {
                    echo session()->get('name');
                } else {
                    echo 'Anonymous';
                }
            ?>
          </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <?php
                if(session()->get('name')) {
                    echo '<li><a class="dropdown-item" href="#">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Post You Might Like
                    </a></li>';
                    echo '<li><a class="dropdown-item" href="logout">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Sign Out
                    </a></li>';
                } else {
                    echo '<li>
                    <a class="dropdown-item" href="login">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Sign In</a></li>';
                }
            ?>
        </ul>
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

  <main class="container mt-4">
    <div class="row">
      <!-- Sidebar Kiri -->
      <aside class="col-md-2 mb-4">
        <div class="card">
          <div class="card-body">
            <nav class="nav flex-column">
              <a class="nav-link text-dark" href="#"
                ><i class="fas fa-home me-2"></i>Home</a
              >
              <a class="nav-link text-dark" href="#"
                ><i class="fas fa-users me-2"></i>Community</a
              >
              <a class="nav-link text-dark" href="#"
                ><i class="fas fa-pen me-2"></i>Write</a
              >
            </nav>
          </div>
        </div>
      </aside>

      <!-- Bagian Konten Tengah -->
      <section class="col-md-7 mb-4">
        <!-- Post 1 -->
        <div class="card mb-4">
          <div class="card-body">
            <!-- Header Post -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex align-items-center">
                <img
                  src="https://storage.googleapis.com/a1aa/image/nQfdWL0UPeD6lNN1EO4AR2-CNB48bUCvkb7zUBLTLn0.jpg"
                  alt="General Knowledge"
                  class="rounded-circle me-2"
                  width="40"
                  height="40"
                />
                <div>
                  <div class="fw-bold">General Knowledge</div>
                  <div class="text-muted">Posted by Annonymous • 2y</div>
                </div>
              </div>
              <button class="btn btn-outline-secondary btn-follow">
                Follow
              </button>
            </div>

            <!-- Isi Post -->
            <p>Correcting my mistakes by eraser ...</p>
            <img
              src="https://storage.googleapis.com/a1aa/image/E8RbN6Ns1yt0h1Jw2DMLxf4ppNTeVw2HJUyHasW5ddw.jpg"
              alt="German Scholar Max Muller and Vivekanand"
              class="img-fluid mb-3"
            />

            <!-- Actions -->
            <div class="d-flex text-muted post-actions">
              <div class="me-3">
                <i class="fas fa-thumbs-up"></i> 1K
              </div>
              <div class="me-3">
                <i class="fas fa-comment"></i> 30
              </div>
              <div>
                <i class="fas fa-share"></i> 52
              </div>
            </div>
          </div>
        </div>

        <!-- Post 2 -->
        <div class="card">
          <div class="card-body">
            <!-- Header Post -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex align-items-center">
                <img
                  src="https://storage.googleapis.com/a1aa/image/dSJBMjdpVoGpkcRmwEsxi3X5zVK-DS91qCbQ2FdU_eE.jpg"
                  alt="Mathematics and Physics"
                  class="rounded-circle me-2"
                  width="40"
                  height="40"
                />
                <div>
                  <div class="fw-bold">Mathematics and Physics</div>
                  <div class="text-muted">
                    Posted by Ronak Singh Raina • 2y
                  </div>
                </div>
              </div>
              <button class="btn btn-outline-secondary btn-follow">
                Follow
              </button>
            </div>
            <!-- (Tambahkan konten post) -->
          </div>
        </div>
      </section>

      <!-- Sidebar Kanan -->
      <aside class="col-md-3 mb-4">
        <div class="card mb-4">
          <div class="card-body">
            <p class="fw-bold">What do you want to ask or share?</p>
            <div class="d-grid gap-2">
              <button class="btn btn-outline-secondary">Ask</button>
              <button class="btn btn-outline-secondary">Answer</button>
              <button class="btn btn-outline-secondary">Post</button>
            </div>
          </div>
        </div>

        <!-- Card: Link-Link Tambahan -->
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-1">
              <a href="#" class="btn btn-link text-dark">About</a>
              <a href="#" class="btn btn-link text-dark">Careers</a>
              <a href="#" class="btn btn-link text-dark">Terms</a>
              <a href="#" class="btn btn-link text-dark">Privacy</a>
              <a href="#" class="btn btn-link text-dark">Advertise</a>
              <a href="#" class="btn btn-link text-dark">Press</a>
              <a href="#" class="btn btn-link text-dark">Your Ad Choices</a>
              <a href="#" class="btn btn-link text-dark">Guidelines</a>
              <a href="#" class="btn btn-link text-dark">Grievance Officer</a>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </main>

  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  ></script>
</body>
</html>.