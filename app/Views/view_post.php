<?php
$userModel = new \App\Models\UserModel();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="<?= session()->get('theme') ?? 'light'; ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BEEKL • Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('css/beeklplus.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/escape-html/1.0.3/escape-html.min.js"></script>
    <script src="<?= base_url('js/beeklplus.js') ?>"></script>

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
        /* background & teks umum */
  html[data-bs-theme="dark"] body {
    background-color: #121212 !important;
    color: #f5f5f5;
  }
  /* header */
  html[data-bs-theme="dark"] header {
    background-color: #1e1e1e !important;
    border-bottom-color: #333 !important;
  }
  html[data-bs-theme="dark"] .header-logo,
  html[data-bs-theme="dark"] .btn-outline-secondary,
  html[data-bs-theme="dark"] .dropdown-toggle {
    color: #f5f5f5 !important;
    border-color: #444 !important;
  }
  /* search input */
  html[data-bs-theme="dark"] .search-wrapper input {
    background-color: #2c2c2c !important;
    color: #f5f5f5 !important;
    border-color: #444 !important;
  }
  /* sidebar kiri & kanan */
  html[data-bs-theme="dark"] aside .card,
  html[data-bs-theme="dark"] .card-left {
    background-color: #1e1e1e !important;
    border-color: #333 !important;
  }
  html[data-bs-theme="dark"] .nav-link,
  html[data-bs-theme="dark"] .btn-outline-black {
    color: #f5f5f5 !important;
    border-color: #444 !important;
  }
  /* konten tengah (post cards) */
  html[data-bs-theme="dark"] .card {
    background-color: #2a2a2a !important;
    border-color: #444 !important;
  }
  html[data-bs-theme="dark"] .card-body,
  html[data-bs-theme="dark"] .post-actions i,
  html[data-bs-theme="dark"] .text-muted {
    color: #e0e0e0 !important;
  }
  /* tombol */
  html[data-bs-theme="dark"] .btn-primary,
  html[data-bs-theme="dark"] .btn-follow {
    background-color: #ff4d00 !important;
    border-color: #ff4d00 !important;
    color: #fff !important;
  }
  html[data-bs-theme="dark"] .btn-secondary,
  html[data-bs-theme="dark"] .btn-outline-secondary {
    background-color: #2c2c2c !important;
    border-color: #444 !important;
    color: #f5f5f5 !important;
  }
  /* dropdown menu & modal */
  html[data-bs-theme="dark"] .dropdown-menu,
  html[data-bs-theme="dark"] .modal-content {
    background-color: #2c2c2c !important;
    color: #f5f5f5 !important;
  }
  /* comment input */
  html[data-bs-theme="dark"] .comment-input {
    background-color: #1e1e1e !important;
    color: #f5f5f5 !important;
    border-color: #444 !important;
  }
  /* checkbox label, badge, link */
  html[data-bs-theme="dark"] .checkbox label,
  html[data-bs-theme="dark"] .badge,
  html[data-bs-theme="dark"] a.text-decoration-none {
    color: #f5f5f5 !important;
  }
  /* toast */
  html[data-bs-theme="dark"] .toast {
    background-color: #2c2c2c !important;
    color: #f5f5f5 !important;
  }
    </style>
</head>
<body data-user='<?= json_encode($user ?? []) ?>'>

    <!-- DARK MODE TOGGLE BUTTON -->
<?php if(session()->get('name')):?>
    <?php if(isset($user['is_premium']) && $user['is_premium']): ?>
        <div class="position-fixed top-0 end-0 p-3" style="z-index:1500;">
        <button id="toggleMode" class="btn btn-sm btn-outline-secondary">
            <i class="fa fa-moon"></i>
        </button>
        </div>
    <?php endif;?>
<?php endif;?>
  <header>
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

      <!-- Search Bar -->
      <div class="search-wrapper">
        <i class="fas fa-search"></i>
        <form action="<?= base_url('search')?>" method="post">
            <input
            type="text"
            class="form-control"
            name="search"
            placeholder="Search your thoughts"
            />
        </form>
      </div>

      <!-- Bagian Kanan Header -->
      <div class="d-flex align-items-center">
        <?php if(session()->get('name')):?>
            <?php if(isset($user['is_premium']) && $user['is_premium']): ?>
                <!-- Removed separate Change Frame dropdown and Dark Mode toggle button -->
            <?php else: ?>
                <a href="/beeklplus/pricing" class="btn btn-outline-secondary rounded-pill me-3" role="button" style="cursor:pointer; text-decoration:none; display:inline-block;">
                    Try BEEKL+
                </a>
            <?php endif; ?>
        <?php endif;?>
        
        <button
            class="btn btn-outline-secondary dropdown-toggle rounded-pill me-3"
            type="button"
            id="dropdownMenuButton2"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <div class="avatar-frame <?= isset($_SESSION['avatar_frame']) ? 'frame-'.$_SESSION['avatar_frame'] : '' ?>">
                <img src="https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg"
                alt="User avatar"
                class="rounded-circle"
                width="40"
                height="40"/>
                <?php if(isset($_SESSION['is_premium']) && $_SESSION['is_premium']): ?>
                    <span class="premium-badge">+</span>
                <?php endif; ?>
            </div>
            <?php
                if(session()->get('name')) {
                    echo session()->get('name');
                } else {
                    echo 'Anonymous';
                }
            ?>
          </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <?php if(session()->get('name')): ?>
                    <?php if(isset($user['is_premium']) && $user['is_premium']): ?>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item d-flex align-items-center" href="#" id="dropdownFrameToggle">
                                <i class="fas fa-image me-2"></i><span>Change Frame</span>
                            </a>
                            <ul class="dropdown-menu" id="frameSubmenu" style="display:none;">
                                <li><a class="dropdown-item" href="#" onclick="setAvatarFrame('gold')"><i class="fas fa-circle text-warning me-2"></i>Gold Frame</a></li>
                                <li><a class="dropdown-item" href="#" onclick="setAvatarFrame('diamond')"><i class="fas fa-gem text-info me-2"></i>Diamond Frame</a></li>
                                <li><a class="dropdown-item" href="#" onclick="setAvatarFrame('rainbow')"><i class="fas fa-rainbow text-success me-2"></i>Rainbow Frame</a></li>
                            </ul>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item" href="<?= base_url('profile/')?><?= session()->get('name') ?>">
                        <i class="fas fa-user-circle" aria-hidden="true"></i> Profile
                    </a></li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('logout')?>">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('login')?>">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Sign In
                        </a>
                    </li>
                    
                <?php endif; ?>
        </ul>
        <?php
            if (session()->get('name')) { // Check if user is logged in
            // Display notification icon only if user is logged in
        ?>
        <div class="dropdown ms-3">
            <?php
                //count how many notifications from user
                $notificationModel = new \App\Models\NotificationModel();
                $notificationcount = $notificationModel->
                where('userID', session()->get('id'))
                ->where('isRead', 0)
                ->countAllResults();
            ?>
            <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i class="fas fa-bell"></i>  <?php echo $notificationcount ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <?php
                    if($notificationcount > 0) {
                        echo '<li><a class="dropdown-item" href="/notifications">Yeay. You have '.$notificationcount.' new notifications</a></li>';
                    } else {
                        echo '<li><a class="dropdown-item" href="/notifications">No new notifications. See if you like</a></li>';
                    }
                ?>
            </ul>
        </div>
        <?php }?>
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
            <p class="fw-bold text-md-center">What do you want today?</p>
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
                                <textarea class="form-control mb-3" name="content" id="textAreaExample" rows="4"
                                  placeholder="Tell me your Stories...."></textarea>

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
            foreach($postforum as $post) {
            //get date from created_at with date,month,year
           $date = date('d-m-Y', strtotime($post['created_at']));

           //Check if image is null
           if($post['images'] == null) {
               $image = "";
           } else {
               $image = '<img src="'.base_url('uploads/'.$post['images']).'" class="card-img-top" alt="...">';
           }
           //if not signed in
           if(!session()->get('name')) { ?>
                <!-- Header Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                           <div class="d-flex align-items-center">
                               <img
                               src="https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg"
                               class="rounded-circle me-2"
                               width="40"
                               height="40"
                               />
                               <div>
                                   <div class="fw-bold">
                                       <a class="text-decoration-none text-dark" href="/post/<?= $post['titlePost']?>"> <?= $post['titlePost']?> </a></br>
                                       <span class="badge bg-secondary"><?php echo $post['genre']?></span>
                                   </div>
                                   <div class="text-muted">
                                       Posted by <?php echo $post['name']?> • <?php echo $date?>
                                   </div>
                               </div>
                           </div>
                           <button class="btn btn-outline-secondary btn-follow">
                               Follow
                           </button>
                        </div>
                        <!-- Isi Post -->
                        <p><?php echo $post['content']?></p>
                        <?php echo $image?>
                        <div class="d-flex text-muted post-actions">
                            <?php
                            //count like
                            $likeCount = $post['likes'];
                            if($likeCount == 0) {
                                $likeCount = $post['likes']." like";
                            } else {
                                //check if likeCount > 1
                                if($likeCount > 1) {
                                    $likeCount = $post['likes']." like";
                                } else {
                                    $likeCount = $post['likes']." like";
                                }
                            }
                            ?>
                           <div class="me-3">
                               <i class="fas fa-thumbs-up"></i><?= $likeCount?>
                           </div>
                           <?php
                                //comment count
                                $commentCount = $post['comments'];
                                if($commentCount == 0) {
                                    $commentCount = $post['comments']." comment";
                                    } else {
                                        //check if commentCount > 1
                                        if($commentCount > 1) {
                                            $commentCount = $post['comments']." people commented";
                                        } else {
                                            $commentCount = $post['comments']." person commented";
                                        }
                                    }
                                
                            ?>
                            
                            <div class="me-3">
                                <a href="#" onclick="loadComments(<?= $post['postID'] ?>) id="load-comment" role="button" data-bs-toggle="modal" data-bs-target="#commentModal<?php echo $post['postID']?>" class="text-decoration-none text-dark">
                                    <i class="fas fa-comment me-1"></i><?= $commentCount?>
                                </a>
                            </div>
                            <div class="modal fade" id="commentModal<?php echo $post['postID']?>" tabindex="-1" aria-labelledby="commentModalLabel<?php echo $post['postID']?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentModalLabel'.$post['postID'].'">Comments from post <?php echo $post['titlePost']?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            // check comment count
                                            $commentModel = new \App\Models\CommentModel();
                                            $comments = $commentModel->where('postID', $post['postID'])->findAll();
                                            if(count($comments) == 0) {
                                                echo '<p class="text-muted">No comments yet.</p>';
                                            } else {
                                                echo '<div class="comment-list">';
                                                foreach($comments as $comment) {
                                                    //get user data
                                                    $userModel = new \App\Models\UserModel();
                                                    $user = $userModel->find($comment['userID']);
                                                    ?>
                                                    <div class="comment-item">
                                                        <img src="https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg" alt="User Avatar" class="comment-avatar">
                                                        <div class="comment-content">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="comment-indentity">
                                                                        <div class="comment-author"><?php echo $user['name'] ?></div>
                                                                        <div class="comment-time text-muted"><?php echo date('d-m-Y H:i', strtotime($comment['created_at'])) ?></div>
                                                                    </div>
                                                                    <div class="comment-text"><?php echo $comment['content'] ?></div>
                                                                </div>
                                                                <?php if(session()->get('id') == $comment['userID']) { ?>
                                                                    <a href="/deleteComment_atHomePage/<?php echo $comment['commentID']?>" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                    <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="me-3">
                               <a href="#share" class="text-decoration-none text-dark share-btn" data-post-url="<?= base_url('/post/' . urlencode($post['titlePost'])) ?>">
                                <i class="fas fa-share me-1"></i>
                            </a>
                           </div>
                       </div>
                   </div>
               </div>
            <?php } else {?>
               <!-- Header Post -->
               <div class="card mb-4">
                   <div class="card-body">
                       <div class="d-flex justify-content-between align-items-center mb-3">
                           <div class="d-flex align-items-center">
                               <img
                               src="https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg"
                               class="rounded-circle me-2"
                               width="40"
                               height="40"
                               />
                               <div>
                                   <div class="fw-bold">
                                    <a class="text-decoration-none text-dark" href="/post/<?= $post['titlePost']?>"> <?= $post['titlePost']?> </a></br>
                                       <span class="badge bg-secondary"><?php echo $post['genre']?></span>
                                   </div>
                                   <div class="text-muted">
                                       Posted by <?php echo $post['name']?> • <?php echo $date?>
                                   </div>
                               </div>
                           </div>
                           <button class="btn btn-outline-secondary btn-follow">
                               Follow
                           </button>
                       </div>
                       <!-- Isi Post -->
                       <p><?php echo $post['content']?></p>
                       <?php echo $image?>
                       <div class="d-flex text-muted post-action m-2">
                                <?php
                                //count like
                                $likeCount = $post['likes'];
                                if($likeCount == 0) {
                                    $likeCount = "Be the first to like this post";
                                } else {
                                    //check if likeCount > 1
                                    if($likeCount > 1) {
                                        $likeCount = $post['likes']." people like this post";
                                    } else {
                                        $likeCount = $post['likes']." person like this post";
                                    }
                                }
                                //check if user already like the post
                                $session = session();
                                $userID = $session->get('id');
                                $likeModel = new \App\Models\LikeModel();
                                $like = $likeModel->
                                where('userID', $userID)
                                ->where('postID', $post['postID'])
                                ->first();
                                if($like) {?>
                                        <div class="me-3">
                                            <a href="/unlikePost_atHomePage/<?php echo $post['postID']?>" class="text-decoration-none text-dark"><i class="fa fa-thumbs-up me-1"></i><?php echo $likeCount?></a>
                                        </div>
                                        
                                <?php } else {?>
                                        <div class="me-3">
                                            <a href="/likePost_atHomePage/<?php echo $post['postID']?>" class="text-decoration-none text-dark"><i class="fa fa-thumbs-o-up me-1"></i><?php echo $likeCount?></a>
                                        </div>
                                <?php }?>
                           <div class="me-3">
                            <?php
                                //comment count
                                $commentCount = $post['comments'];
                                if($commentCount == 0) {
                                    $commentCount = "No one commented yet";
                                    } else {
                                        //check if commentCount > 1
                                        if($commentCount > 1) {
                                            $commentCount = $post['comments']." people commented";
                                        } else {
                                            $commentCount = $post['comments']." person commented";
                                        }
                                    }
                                
                            ?>
                                <a href="#" onclick="loadComments(<?= $post['postID'] ?>) id="load-comment" role="button" data-bs-toggle="modal" data-bs-target="#commentModal<?php echo $post['postID']?>" class="text-decoration-none text-dark">
                                    <i class="fas fa-comment me-1"></i><?= $commentCount?>
                                </a>
                            </div>
                            <div class="modal fade" id="commentModal<?php echo $post['postID']?>" tabindex="-1" aria-labelledby="commentModalLabel<?php echo $post['postID']?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentModalLabel'.$post['postID'].'">Comments from post <?php echo $post['titlePost']?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            // check comment count
                                            $commentModel = new \App\Models\CommentModel();
                                            $comments = $commentModel->where('postID', $post['postID'])->findAll();
                                            if(count($comments) == 0) {
                                                echo '<p class="text-muted">No comments yet.</p>';
                                            } else {
                                                echo '<div class="comment-list">';
                                                foreach($comments as $comment) {
                                                    //get user data
                                                    $userModel = new \App\Models\UserModel();
                                                    $user = $userModel->find($comment['userID']);
                                                    ?>
                                                    <div class="comment-item">
                                                        <img src="https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg" alt="User Avatar" class="comment-avatar">
                                                        <div class="comment-content">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="comment-indentity">
                                                                        <div class="comment-author"><?php echo $user['name'] ?></div>
                                                                        <div class="comment-time text-muted"><?php echo date('d-m-Y H:i', strtotime($comment['created_at'])) ?></div>
                                                                    </div>
                                                                    <div class="comment-text"><?php echo $comment['content'] ?></div>
                                                                </div>
                                                                <?php if(session()->get('id') == $comment['userID']) { ?>
                                                                    <a href="/deleteComment_atHomePage/<?php echo $comment['commentID']?>" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                    <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="me-3">
                                <a href="#share" 
                                class="share-btn text-decoration-none text-dark" 
                                data-post-url="<?= base_url('post/' . urlencode($post['titlePost'])) ?>"
                                title="Share this post">
                                    <i class="fas fa-share me-1"></i>
                                </a>
                            </div>
                       </div>
                       <!-- Comment form -->
                        <form action="/addComment_atHomePage/<?php echo $post['postID'] ?>" method="post">
                                <div class="comment-input-wrapper">
                                <input type="text" class="comment-input" name="content" placeholder="Add Comment here...">
                                <button class="send-comment-btn">
                                    <i class="fas fa-paper-plane text-black"></i>
                                </button>
                            </div>
                        </form>
                   </div>
               </div>
               <?php
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
        <div class="card mb-4">
          <div class="card-body">
            <p class="fw-bold text-md-center">What kind of genres you might like?</p>
            <div class="d-grid gap-2">
                <!-- Baris 1 -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url('genre/Olahraga')?>" class="badge bg-secondary text-decoration-none">Sport</a>
                    <a href="<?= base_url('genre/Anime')?>" class="badge bg-secondary text-decoration-none">Anime</a>
                    <a href="<?= base_url('genre/Politik')?>" class="badge bg-secondary text-decoration-none">Politic</a>
                </div>
                <!-- Baris 2 -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url('genre/Film')?>" class="badge bg-secondary text-decoration-none">Movie</a>
                    <a href="<?= base_url('genre/Berita')?>" class="badge bg-secondary text-decoration-none">News</a>
                    <a href="<?= base_url('genre/Komedi')?>" class="badge bg-secondary text-decoration-none">Comedy</a>
                </div>
                <!-- Baris 3 -->
                <div class="d-flex justify-content-between align-item-center">
                    <a href="<?= base_url('genre/Buku')?>" class="badge bg-secondary text-decoration-none">Book</a>
                    <a href="<?= base_url('genre/Otomotif')?>" class="badge bg-secondary text-decoration-none">Automotive</a>
                    <a href="<?= base_url('genre/Teknologi')?>" class="badge bg-secondary text-decoration-none">Technology</a>
                </div>
                <!-- Baris 4 -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url('genre/Others')?>" class="badge bg-secondary text-decoration-none">Others</a>
                </div>
            </div>
          </div>
        </div>

        <!-- Trending berdasarkan per kata -->
        <div class="card mb-4">
            <div class="card-body">
                <p class="fw-bold text-md-center">Trending Today</p>
                <ul class="list-group list-group-flush">
                    <?php if (!empty($trendingWords)): ?>
                        <?php foreach ($trendingWords as $word => $count): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-md-center text-dark">
<a class="text-decoration-none text-body" href="<?= base_url('search/trendings/')?><?= esc($word)?>"><?= esc($word) ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">No trending available.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </aside>
    </div>
  </main>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
  <div id="snackbarToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Link copied to clipboard!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.share-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('data-post-url');
            // Copy to clipboard
            if (navigator.clipboard) {
                navigator.clipboard.writeText(url).then(function() {
                    showSnackbar();
                });
            } else {
                // fallback for old browsers
                const tempInput = document.createElement('input');
                tempInput.value = url;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                showSnackbar();
            }
        });
    });

    function showSnackbar() {
        var toastEl = document.getElementById('snackbarToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
});
</script>
    <!-- DARK MODE TOGGLE SCRIPT -->
<script>
  (function(){
    const btn  = document.getElementById('toggleMode'),
          icon = btn.querySelector('i'),
          html = document.documentElement;
    btn.addEventListener('click', () => {
      const next = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-bs-theme', next);
      icon.classList.toggle('fa-moon');
      icon.classList.toggle('fa-sun');
      fetch('<?= base_url('theme/set') ?>', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({ theme: next })
      });
    });
  })();
</script>

</body>
</html>
