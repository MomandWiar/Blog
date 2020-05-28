<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Posts</h1>
        <h4>Here you can Create or Edit a Post!</h4>
    </div>

    <a href="/posts/create-post">Click here to create a new Post!</a>

    <section class="blog">
        <?php foreach ($data['posts'] as $post) : ?>
            <ul>
                <li class="number"><?= $post->id ?></li>
                <li class="title"><a href="#"><?= $post->title ?></a></li>
                <li class="description"><?= $post->description ?></li>
                <li class="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
                <a href="/posts/edit-post?id=<?= $post->id ?>" class="info">Edit</a>
            </ul>
        <?php endforeach; ?>
    </section>

    <section class="pagination">
        <div class="pagination-options">
            <?php if($data['page'] - 1) : ?>
                <a href="/posts?page=<?= $data['page'] - 1; ?>">Last Page</a>
            <?php endif; ?>
            <p><?= $data['page'] ?></p>
            <?php if($data['page'] < $data['number_of_pages']) : ?>
                <a href="/posts?page=<?= $data['page'] + 1; ?>">Next Page</a>
            <?php endif; ?>
        </div>
    </section>

<?php include './App/views/partials/footer.php'; ?>