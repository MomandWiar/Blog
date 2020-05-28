<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Posts</h1>
        <h4>Here you can create or edit a Post!</h4>
    </div>

    <a href="/posts/create-post">Click here to create a new blog</a>

    <section class="blog">
        <?php foreach ($data['posts'] as $post) : ?>
            <ul>
                <li class="number"><?= $post->id ?></li>
                <li class="title"><a href="#"><?= $post->title ?></a></li>
                <li class="description"><?= $post->description ?></li>
                <li class="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
                <a class="info">Edit</a>
            </ul>
        <?php endforeach; ?>
    </section>

<?php include 'partials/footer.php'; ?>