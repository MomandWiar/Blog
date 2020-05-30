<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Welcome to our Blog</h1>
        <h4>Search around for a interesting item!</h4>
    </div>

    <section class="blog">
        <?php foreach ($data['paginate_result']['post'] as $post) : ?>
            <ul id="post<?= $post->postId ?>">
                <li class="number"><?= $post->postId ?></li>
                <li class="title"><a href="moreInfo?about=<?= $post->postId; ?>"><?= $post->title ?></a></li>
                <li class="description"><?= $post->description ?></li>
                <li class="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
                <a class="info" id="info<?= $post->postId ?>" onclick="showComments(<?= $post->postId ?>)">+</a>
            </ul>
        <?php endforeach; ?>
    </section>

    <section class="pagination">
        <div class="pagination-options">
            <a class="<?= $data['page_number'] <= 1 ? 'hide' : '' ?>" href="/?page=<?= $data['page_number'] - 1; ?>">Last Page</a>
            <p><?= $data['page_number'] ?></p>
            <a class="<?= $data['page_number'] >= $data['number_of_pages'] ? 'hide' : '' ?>" href="/?page=<?= $data['page_number'] + 1; ?>">Next Page</a>
        </div>
    </section>

<?php include 'partials/footer.php'; ?>