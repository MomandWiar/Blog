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
                <a id="info">+</a>
            </ul>
        <?php endforeach; ?>
    </section>

    <section class="pagination">
        <div class="pagination-options">

            <?php if ($data['paginate_result']['page_number'] <= 1) : ?>
                <a class="hide" href="/?page=<?= $data['paginate_result']['page_number'] - 1; ?>">Last Page</a>
            <?php else : ?>
                <a href="/?page=<?= $data['paginate_result']['page_number'] - 1; ?>">Last Page</a>
            <?php endif ?>

                <p><?= $data['paginate_result']['page_number'] ?></p>

            <?php if ($data['paginate_result']['page_number'] >= $data['paginate_result']['number_of_pages']) : ?>
                <a class='hide' href="/?page=<?= $data['paginate_result']['page_number'] + 1; ?>">Next Page</a>
            <?php else : ?>
                <a href="/?page=<?= $data['paginate_result']['page_number'] + 1; ?>">Next Page</a>
            <?php endif ?>

        </div>
    </section>

<?php include 'partials/footer.php'; ?>