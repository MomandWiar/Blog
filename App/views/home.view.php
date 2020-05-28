<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Welcome to our Blog</h1>
        <h4>Search around for a interesting item!</h4>
    </div>

    <section class="blog">
        <?php foreach ($data['posts'] as $post) : ?>
            <ul>
                <li class="number"><?= $post->id ?></li>
                <li class="title"><a href="#"><?= $post->title ?></a></li>
                <li class="description"><?= $post->description ?></li>
                <li class="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
                <a class="info">+</a>
            </ul>
        <?php endforeach; ?>
    </section>

    <section class="pagination">
        <div class="pagination-options">
            <?php if($data['page'] - 1) : ?>
                <a href="/?page=<?= $data['page'] - 1; ?>">Last Page</a>
            <?php endif; ?>
                <p><?= $data['page'] ?></p>
            <?php if($data['page'] < $data['number_of_pages']) : ?>
                <a href="/?page=<?= $data['page'] + 1; ?>">Next Page</a>
            <?php endif; ?>
        </div>
    </section>

<?php include 'partials/footer.php'; ?>