<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BEEKL • Notifications</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/escape-html/1.0.3/escape-html.min.js"></script>

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
    .card-left {
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
    /* Comment Modal */
    .comment-modal {
      max-width: 400px;
      margin: 1.75rem auto;
    }
    .comment-modal .modal-content {
      border-radius: 12px;
    }
    .comment-modal .modal-header {
      border-bottom: none;
      padding: 1rem;
    }
    .comment-modal .modal-body {
      padding: 0 1rem;
    }
    .comment-list {
      max-height: 400px;
      overflow-y: auto;
    }
    .comment-item {
      display: flex;
      gap: 10px;
      margin-bottom: 1rem;
    }
    .comment-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
    }
    .comment-content {
      flex: 1;
    }
    .comment-author {
      font-weight: 600;
      margin-bottom: 2px;
    }
    .comment-text {
      color: #666;
      font-size: 0.9rem;
    }
    .comment-time {
      color: #999;
      font-size: 0.8rem;
    }
    .comment-input-wrapper {
      display: flex;
      gap: 10px;
      padding: 1rem;
      border-top: 1px solid #eee;
    }
    .comment-input {
      flex: 1;
      border: none;
      padding: 8px 12px;
      border-radius: 20px;
      background: #f0f2f5;
    }
    .comment-input:focus {
      outline: none;
      background: #e4e6e9;
    }
    .send-comment-btn {
      background: none;
      border: none;
      color: #1877f2;
      cursor: pointer;
    }
    .send-comment-btn:hover {
      color: #0056b3;
    }
    .comment-indentity{
        margin-right: 15px;
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
                if(session()->get('name')) { ?>
                    <?php echo session()->get('name'); ?>
                <?php } else { ?>
                    <?php echo 'Anonymous'; ?>
                <?php } ?>
          </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <?php
                if(session()->get('name')) { ?>
                    <li><a class="dropdown-item" href="/profile/<?=session()->get('name')?>"><i class="fas fa-user-circle" aria-hidden="true"></i>
                    Profile
                    </a></li>
                    <li><a class="dropdown-item" href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
                    Sign Out
                    </a></li>
                <?php } else { ?>
                    <li>
                    <a class="dropdown-item" href="login">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Sign In</a></li>
                <?php } ?>
            
        </ul>
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

  <main class="container mt-4">
    <div class="row">
      <!-- Sidebar Kiri -->
      <aside class="col-md-2 mb-4">
        <div class="card-left">
            <div class="card-body">
            <p class="fw-bold ">What do you want today?</p>
                <nav class="nav flex-column">
                    <a href="/home" class="btn btn-outline-black me-2 m-1" role="button"><i class="fas fa-home me-2"></i>Home</a>
                    <a href="#" class="btn btn-outline-black me-2 m-1" role="button"><i class="fas fa-home me-2"></i>Community</a>
                    <?php if(session()->get('name')){?>
                        <a href="compose" class="btn btn-outline-black me-2 m-1" role="button" data-bs-toggle="modal"
                        data-bs-target="#modalWritePost"><i class="fas fa-pen me-2"></i>Write</a>
                    <?php }?>
                <!--
                <a class="nav-link text-dark" href="#"
                    ><i class="fas fa-home me-2"></i>Home</a
                >
                <a class="nav-link text-dark" href="#"
                    ><i class="fas fa-users me-2"></i>Community</a
                >
                <a class="nav-link text-dark" href="/post"
                    ><i class="fas fa-pen me-2"></i>Write</a
                >
                -->
                </nav>
            </div>
        </div>
      </aside>
  
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div
        class="modal fade"
        id="modalWritePost"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
            role="document"
        >
            <div class="modal-content">
                <form action="/postfromhomepage" method="post" enctype="multipart/form-data"><!-- update bug-->
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Post your content
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body w-100 h-100">
                        <div class="mb-3">
                            <label for="" class="form-label mb-3" aria-placeholder="Your Title Name">Title Name</label>
                            <input
                                type="text"
                                class="form-control mb-3"
                                name="titlePost"
                                id=""
                                aria-describedby="helpId"
                                placeholder="your title name to post.."
                            />
                            <div class="form-group mb-3">
                              <label for="">Genre</label>
                              <select class="form-control mb-3" name="genre" id="">
                                <option>Olahraga</option>
                                <option>Anime</option>
                                <option>Politik</option>
                                <option>Teknologi</option>
                                <option>Film</option>
                                <option>Berita</option>
                                <option>Komedi</option>
                                <option>Buku</option>
                                <option>Teknologi</option>
                                <option>Otomotif</option>
                                <option>Others</option>
                              </select>
                            </div>
                            <div data-mdb-input-init class="form-outline w-100">
                                <label for="">Content</label>
                                <textarea class="form-control mb-3" name='content' id="textAreaExample" rows="4"
                                style="background: #fff;" placeholder="Tell me your Stories...."></textarea>
                            </div>
                               
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group mb-3">
                              <label class="custom-file">
                                <input type="file" name="images" placeholder="example.jpeg [must be .jpeg/.png]" class="custom-file-input" aria-describedby="fileHelpId">
                                <span class="custom-file-control"></span>
                              </label>
                            </div>    
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="submit"
                            class="btn btn-primary">
                                Submit
                        </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional: Place to the bottom of scripts -->

    <!-- Bagian Konten Tengah -->
    <section class="col-md-7 mb-4">
        <?php
            $session = session();
            $userID = $session->get('id');
            //if post notifications is available
            if (!empty($notificationsPost)) {
                //if the userID is the same as the post notification userID
                if ($userID == $notificationsPost[0]['userID']) {
                    // Loop through each post notification
                    foreach ($notificationsPost as $notification_post) {?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"> You posted a new content. </h5>
                                <p class="card-text"><small class="text-muted">Posted on <?= date('d M Y H:i', strtotime($notification_post['created_at']))?></small></p>
                            </div>
                        </div>
                        <?php
                        //delete the post notification with anchor button
                    }
                }else{
                    foreach ($notificationsPost as $notification_post) {?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($notification_like['message']) ?></h5>
                                <p class="card-text"><small class="text-muted">Posted on <?= date('d M Y H:i', strtotime($notification_post['created_at']))?></small></p>
                            </div>
                        </div>
                        <?php
                    }
                }
            }else{
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<p class="card-text"><small class="text-muted">You have no new notifications</small></p>';
                echo '</div>';
                echo '</div>';
            }
            //if like notifications is available
            if (!empty($notificationsLike)) {
                //check if they has different user
                if ($userID != $notificationsLike[0]['userID']) {
                    // Loop through each like notification
                    foreach ($notificationsLike as $notification_like) {
                        echo '<div class="card mb-3">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . esc($notification_like['message']) . '</h5>';
                        echo '<p class="card-text"><small class="text-muted">Liked on ' . date('d M Y H:i', strtotime($notification_like['created_at'])) . '</small></p>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
        ?>
    </section>
      <!-- Sidebar Kanan -->
    <aside class="col-md-3 mb-4">
        <!--
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
        -->

        <!-- Card: Link-Link Tambahan -->
        <div class="card">
          <div class="card-body">
            <p class="fw-bold">What kind of genres you might like?</p>
            <div class="d-grid gap-2">
                <!-- Baris 1 -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="genre/Olahraga" class="badge bg-secondary text-decoration-none">Sport</a>
                    <a href="genre/Anime" class="badge bg-secondary text-decoration-none">Anime</a>
                    <a href="genre/Politik" class="badge bg-secondary text-decoration-none">Politic</a>
                </div>
                <!-- Baris 2 -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="genre/Film" class="badge bg-secondary text-decoration-none">Movie</a>
                    <a href="genre/Berita" class="badge bg-secondary text-decoration-none">News</a>
                    <a href="genre/Komedi" class="badge bg-secondary text-decoration-none">Comedy</a>
                </div>
                <!-- Baris 3 -->
                <div class="d-flex justify-content-between align-item-center">
                    <a href="genre/Buku" class="badge bg-secondary text-decoration-none">Book</a>
                    <a href="genre/Otomotif" class="badge bg-secondary text-decoration-none">Automotive</a>
                    <a href="genre/Teknologi" class="badge bg-secondary text-decoration-none">Technology</a>
                </div>
                <!-- Baris 4 -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="genre/Others" class="badge bg-secondary text-decoration-none">Others</a>
                </div>
            </div>
          </div>
        </div>
    </aside>
    </div>
  </main>


</body>
</html>.
