<!DOCTYPE html>
<html>
<head>
    <title>Saved Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h2>Your Saved Posts</h2>
        <?php if (empty($posts)): ?>
            <p class="text-muted">You have no saved posts yet.</p>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($post['titlePost']) ?></h5>
                        <p class="card-text"><?= esc($post['content']) ?></p>
                        <a href="<?= base_url('post/' . urlencode($post['titlePost'])) ?>" class="btn btn-primary">View Post</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
